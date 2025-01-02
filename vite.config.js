import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/js/app.js"],
      refresh: true,
    }),
  ],
  server: {
    port: 4500,
  },
});