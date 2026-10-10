<script>
  let { slides = [] } = $props();
  let i = $state(0);
  const next = () => (i = (i + 1) % Math.max(slides.length, 1));
  const prev = () => (i = (i - 1 + slides.length) % Math.max(slides.length, 1));
</script>

{#if slides.length > 0}
  <div role="region" aria-label="Sorotan karya">
    <p><strong>{slides[i].title_override ?? slides[i].type}</strong></p>
    {#if slides[i].description_override}<p>{slides[i].description_override}</p>{/if}
    <p>
      <button onclick={prev} aria-label="Sebelumnya">←</button>
      <span>{i + 1} / {slides.length}</span>
      <button onclick={next} aria-label="Berikutnya">→</button>
    </p>
  </div>
{:else}
  <p>Lihat apa yang sudah kami bangun.</p>
{/if}
