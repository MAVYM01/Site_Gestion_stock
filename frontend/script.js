document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const mot_de_passe = document.getElementById('mot_de_passe').value;

    const response = await fetch('http://localhost/backend/api/auth.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, mot_de_passe })
    });

    const result = await response.json();
    if (result.success) {
        window.location.href = 'dashboard.html';
    } else {
        alert(result.message);
    }
});