<script>
  let { slides = [] } = $props();
  let i = $state(0);
  const n = () => Math.max(slides.length, 1);
  const next = () => (i = (i + 1) % n());
  const prev = () => (i = (i - 1 + slides.length) % n());
</script>

{#if slides.length > 0}
  {@const s = slides[i]}
  <div class="slidecard">
    {#if s.img}<img src={s.img} width="800" height="500" alt={s.alt ?? s.title} loading="lazy" decoding="async" />{/if}
    <div class="slidebody">
      <p class="tag">{s.type ?? 'SOROTAN'}</p>
      <p class="slidetitle">{s.title}</p>
      {#if s.desc}<p class="slidedesc">{s.desc}</p>{/if}
      <p class="spot-nav">
        <button onclick={prev} aria-label="Sorotan sebelumnya">←</button>
        <span style="font-family:var(--font-mono);font-size:.8rem;margin:0 .75rem">{i + 1} / {slides.length}</span>
        <button onclick={next} aria-label="Sorotan berikutnya">→</button>
        {#if s.href}<a href={s.href} style="margin-left:auto;font-size:.9rem;color:var(--color-accent);font-weight:600">Lihat →</a>{/if}
      </p>
    </div>
  </div>
{:else}
  <p>Lihat apa yang sudah kami bangun.</p>
{/if}
