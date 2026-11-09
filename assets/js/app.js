document.addEventListener('DOMContentLoaded', () => {
  const today = new Date().toISOString().split('T')[0];
  document.querySelectorAll('input[type="date"][name="start_date"]').forEach(el => el.min = today);
  document.querySelectorAll('input[type="date"][name="end_date"]').forEach(el => el.min = today);
});
