<script>
  let { slides = [] } = $props();
  let i = $state(0);
  const n = () => Math.max(slides.length, 1);
  const next = () => (i = (i + 1) % n());
  const prev = () => (i = (i - 1 + slides.length) % n());
</script>

{#if slides.length > 0}
  <div>
    <p class="spot-title">{slides[i].title_override ?? slides[i].type}</p>
    {#if slides[i].description_override}<p style="color:var(--color-muted);max-width:52ch">{slides[i].description_override}</p>{/if}
    <p class="spot-nav">
      <button onclick={prev} aria-label="Sorotan sebelumnya">←</button>
      <span style="font-family:var(--font-mono);font-size:.8rem;margin:0 .75rem">{i + 1} / {slides.length}</span>
      <button onclick={next} aria-label="Sorotan berikutnya">→</button>
    </p>
  </div>
{:else}
  <p>Lihat apa yang sudah kami bangun.</p>
{/if}
