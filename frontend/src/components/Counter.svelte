<script>
  let count = $state(0);
</script>

<div>
  <p data-testid="island-status">Island aktif: {count}</p>
  <button onclick={() => count++}>Tambah</button>
</div>
