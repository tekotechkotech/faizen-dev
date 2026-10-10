<script>
  let name = $state('');
  let contact = $state('');
  let intent = $state('CUSTOM');
  let message = $state('');
  let status = $state('idle');
  let error = $state('');

  const base = import.meta.env.PUBLIC_API_URL ?? 'http://localhost:8010/api';

  async function submit(e) {
    e.preventDefault();
    status = 'sending';
    error = '';
    try {
      const res = await fetch(`${base}/inquiry`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify({ name, contact, intent, message }),
      });
      if (!res.ok) throw new Error('failed');
      status = 'sent';
    } catch {
      status = 'error';
      error = 'Gagal mengirim. Periksa kembali isian Anda.';
    }
  }
</script>

{#if status === 'sent'}
  <div><p>Terima kasih! Pesan Anda sudah kami terima. Kami akan menghubungi Anda segera.</p><p><a href="/">← Kembali ke Beranda</a></p></div>
{:else}
  <form onsubmit={submit}>
    {#if status === 'error'}<p class="error" role="alert">{error}</p>{/if}
    <label for="q-name">Nama</label>
    <input id="q-name" bind:value={name} required autocomplete="name" />
    <label for="q-contact">Email / WhatsApp</label>
    <input id="q-contact" bind:value={contact} required />
    <label for="q-intent">Keperluan</label>
    <select id="q-intent" bind:value={intent} required>
      <option value="EXISTING">Solusi yang sudah ada</option>
      <option value="CUSTOM">Solusi custom baru</option>
      <option value="PARTNERSHIP">Kemitraan</option>
      <option value="OTHER">Lainnya</option>
    </select>
    <label for="q-message">Ceritakan kebutuhan Anda</label>
    <textarea id="q-message" bind:value={message} rows="5" required></textarea>
    <p><button class="cta" type="submit" disabled={status === 'sending'}>{status === 'sending' ? 'Mengirim…' : 'Kirim →'}</button></p>
  </form>
{/if}
