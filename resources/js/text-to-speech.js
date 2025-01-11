const defaultOptions = {
  lang: 'id-ID',
  rate: 0.9,
  pitch: 1,
  volume: 1,
  onEnd: () => console.log('Selesai membaca teks'),
  onError: (error) => console.error('Text-to-Speech Error:', error)
};

let isSpeaking = false;

function speakText(text, customOptions = {}) {
  if (isSpeaking) {
    window.speechSynthesis.cancel();
    isSpeaking = false;
    return; 
  }

  if (!('speechSynthesis' in window)) {
    console.error('Browser tidak mendukung Text-to-Speech');
    alert('Maaf, browser Anda tidak mendukung fitur Text-to-Speech');
    return;
  }

  const options = { ...defaultOptions, ...customOptions };
  const utterance = new SpeechSynthesisUtterance(text);
  
  utterance.lang = options.lang;
  utterance.rate = options.rate;
  utterance.pitch = options.pitch;
  utterance.volume = options.volume;

  utterance.onstart = () => {
    isSpeaking = true;
  };

  utterance.onend = () => {
    isSpeaking = false;
    options.onEnd();
  };

  utterance.onerror = (event) => {
    isSpeaking = false;
    options.onError(event.error);
    if (event.error !== 'canceled') {
      alert('Terjadi kesalahan saat memainkan suara');
    }
  };

  window.speechSynthesis.speak(utterance);
}

window.SpeakText = (text, options = {}) => {
  speakText(text, options);
}; 