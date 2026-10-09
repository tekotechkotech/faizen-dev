<script lang="ts">
  /* Hallmark · component: carousel · genre: editorial · theme: locked-system
   * states: default · hover · focus · active · disabled · loading · error · success
   * contrast: pass */
  type Slide = { tag: string; title: string; desc: string; href: string; link: string };
  const slides: Slide[] = [
    { tag: 'Build · Available', title: 'Faizen Biz ID', desc: 'Company profile + custom CMS, HTML-first.', href: '/build', link: 'View build →' },
    { tag: 'Build · Beta', title: 'Nu Gocap Operations', desc: 'Internal ops app, iterative build.', href: '/build', link: 'View build →' },
    { tag: 'Partnership', title: 'Your problem here', desc: 'Bring an idea — scope existing vs custom together.', href: '/lets-build-together', link: 'Start →' },
  ];
  let i = $state(0);
  let dir = $state(1);
  function go(n: number) { dir = n > i ? 1 : -1; i = (n + slides.length) % slides.length; }
  function next() { go(i + 1); }
  function prev() { go(i - 1); }
  function onkey(e: KeyboardEvent) { if (e.key === 'ArrowRight') next(); if (e.key === 'ArrowLeft') prev(); }
</script>

<div class="car" role="region" aria-roledescription="carousel" aria-label="Featured proof" tabindex="0" onkeydown={onkey}>
  <div class="track">
    <p class="mono">{slides[i].tag} · {i + 1} / {slides.length}</p>
    <h3>{slides[i].title}</h3>
    <p class="desc">{slides[i].desc}</p>
    <a href={slides[i].href}>{slides[i].link}</a>
  </div>
  <div class="ctl">
    <button type="button" onclick={prev} aria-label="Previous slide">← <span>Prev</span></button>
    <div class="dots" role="tablist" aria-label="Slides">
      {#each slides as _, k}
        <button type="button" role="tab" aria-selected={k === i} aria-label={`Slide ${k + 1}`} class:active={k === i} onclick={() => go(k)}>●</button>
      {/each}
    </div>
    <button type="button" onclick={next} aria-label="Next slide"><span>Next</span> →</button>
  </div>
</div>

<style>
  .car { border: 1px solid var(--color-line); background: #fff; display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 1rem; padding: 1.4rem; align-items: center; }
  .mono { font-family: var(--font-mono); font-size: 0.72rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--color-mute); margin: 0 0 0.4rem; }
  h3 { font-family: var(--font-display); font-style: normal; font-size: 1.6rem; margin: 0 0 0.4rem; }
  .desc { color: var(--color-ink-2); margin: 0 0 0.7rem; }
  a { font-weight: 700; }
  .ctl { display: flex; flex-direction: column; gap: 0.7rem; align-items: end; }
  button { font-family: var(--font-body); font-weight: 700; background: #fff; color: var(--color-ink); border: 1px solid var(--color-ink); border-radius: 999px; padding: 0.45rem 0.9rem; cursor: pointer; white-space: nowrap; }
  button:hover { background: var(--color-accent-wash); border-color: var(--color-accent-ink); }
  button:focus-visible { outline: 2px solid var(--color-accent); outline-offset: 3px; }
  button:active { transform: translateY(1px); }
  button:disabled { opacity: 0.45; cursor: not-allowed; }
  .dots { display: flex; gap: 0.4rem; }
  .dots button { border: none; padding: 0.2rem 0.35rem; font-size: 0.7rem; color: var(--color-mute); }
  .dots button.active { color: var(--color-accent-ink); }
  @media (max-width: 768px) { .car { grid-template-columns: minmax(0, 1fr); } .ctl { align-items: start; flex-direction: row; } }
</style>
