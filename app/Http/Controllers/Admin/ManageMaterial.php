<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Traits\NotificationHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageMaterial extends Controller
{
    use NotificationHelper;

    public function index()
    {
        $materials = Material::with(['contents'])->latest()->paginate(10);
        return view('pages.admin.materials', compact('materials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty_level' => 'required|in:mudah,sedang,sulit',
            'contents' => 'required|array|min:3',
            'contents.*.section_type' => 'required|in:pengenalan,materi_utama,latihan',
            'contents.*.title' => 'required|string|max:255',
            'contents.*.content' => 'required|string',
            'contents.*.audio_text' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $material = Material::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'difficulty_level' => $validated['difficulty_level']
            ]);

            foreach ($validated['contents'] as $content) $material->contents()->create($content);

            DB::commit();

            Auth::user()->logActivity(
                'Materi Dibuat',
                "Admin telah membuat materi baru: {$material->title}",
                'material_created'
            );

            $this->sendNotification(
                'Materi Baru Tersedia',
                "Materi baru telah ditambahkan: {$material->title}",
                'material_added',
                'fa-book',
                'green'
            );

            return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat materi: ' . $e->getMessage());
        }
    }

    public function edit(Material $material)
    {
        $material->load('contents');
        return view('components.admin.materials.edit-modal', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty_level' => 'required|in:mudah,sedang,sulit',
            'contents' => 'required|array|min:3',
            'contents.*.id' => 'nullable|exists:material_contents,id',
            'contents.*.section_type' => 'required|in:pengenalan,materi_utama,latihan',
            'contents.*.title' => 'required|string|max:255',
            'contents.*.content' => 'required|string',
            'contents.*.audio_text' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $oldTitle = $material->title;
            $oldDescription = $material->description;
            $oldContents = $material->contents()->get()->toArray();

            // Update material
            $material->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'difficulty_level' => $validated['difficulty_level'],
            ]);

            foreach ($validated['contents'] as $content) {
                $content['id']
                    ? $material->contents()->where('id', $content['id'])->update($content)
                    : $material->contents()->create($content);
            }

            DB::commit();

            $changes = [];

            if ($oldTitle !== $validated['title']) $changes[] = "Judul dari '{$oldTitle}' menjadi '{$validated['title']}'";
            if ($oldDescription !== $validated['description']) $changes[] = "Deskripsi materi '{$material->title}'";

            $contentChanged = false;
            foreach ($validated['contents'] as $newContent) {
                if (isset($newContent['id'])) {
                    $oldContent = collect($oldContents)->firstWhere('id', $newContent['id']);
                    if ($oldContent && ($oldContent['content'] !== $newContent['content'] || $oldContent['title'] !== $newContent['title']))
                    {
                        $contentChanged = true;
                        break;
                    }
                }
            }

            $changes = $contentChanged ? ["konten materi '{$material->title}'"] : [];
            $message = $changes ? "Admin telah memperbarui " . implode(', ', $changes) : "Admin telah memperbarui materi '{$material->title}'";

            Auth::user()->logActivity(
                'Materi Diperbarui',
                $message,
                'material_updated'
            );

            $this->sendNotification(
                'Materi Diperbarui',
                "Materi telah diperbarui: {$material->title}",
                'material_updated',
                'fa-edit',
                'blue'
            );

            return redirect()->route('admin.materials.index')->with('success', 'Materi berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui materi');
        }
    }

    public function destroy(Material $material)
    {
        try {
            DB::beginTransaction();
            $material->contents()->delete();
            $material->delete();
            DB::commit();

            Auth::user()->logActivity(
                'Materi Dihapus',
                "Admin telah menghapus materi: {$material->title}",
                'material_deleted'
            );

            $this->sendNotification(
                'Materi Dihapus',
                "Materi telah dihapus: {$material->title}",
                'material_deleted',
                'fa-trash',
                'red'
            );

            return redirect()->route('admin.materials.index') ->with('success', 'Materi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menghapus materi!');
        }
    }

    public function toggleAktif(Material $material)
    {
        try {
            $material->update(['is_active' => !$material->is_active]);
            return response()->json([
                'success' => true,
                'status' => $material->is_active,
                'message' => $material->is_active ? 'Materi diaktifkan.' : 'Materi dinonaktifkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengubah status materi: ' . $e->getMessage()
            ], 500);
        }
    }
}