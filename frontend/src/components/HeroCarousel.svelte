<script lang="ts">
  let i = $state(0);
  const slides = ['faizen-biz-id', 'nu-gocap-app', 'partnership CTA'];
</script>

<div>
  <p>Featured: {slides[i]}</p>
  <button onclick={() => (i = (i + 1) % slides.length)}>Next</button>
</div>
