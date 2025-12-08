<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement du patrimoine</title>
<!-- Font Awesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Xx2s+Zc1p+I6VQ/AdzYk0S6uI7vB8aR9xVr3E+VfjMdcKrX6+Oz7rA6zWbNQaBh9Y1W0os7zTjzTCCjG/++d2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body { font-family: Arial, sans-serif; background:#f4f4f4; margin:0; padding:0; }
    .container { max-width: 500px; margin:50px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 6px 18px rgba(0,0,0,0.15);}
    h1 { text-align:center; color:#00363a; }
    p { text-align:center; color:#0c7074; }
    .logos { display:flex; justify-content:center; gap:20px; margin:20px 0; font-size:36px; color:#00363a; }
    form { display:flex; flex-direction:column; gap:15px; }
    label { font-weight:bold; color:#00363a; }
    input { padding:10px; border-radius:6px; border:1px solid #ccc; font-size:16px; width:100%; }
    .card-details { display:flex; gap:10px; }
    .card-details input { flex:1; }
    button { background:#F9C425; color:#00363a; font-weight:700; padding:12px; border:none; border-radius:8px; cursor:pointer; font-size:18px; transition:0.3s; }
    button:hover { background:#e8b71f; }
    .footer { text-align:center; margin-top:30px; font-size:14px; color:#777; }
</style>
</head>
<body>

<div class="container">
    <h1>Paiement du patrimoine</h1>
    <p>Montant à payer : <strong>{{ $amount ?? '1000' }} XOF</strong></p>

    <div class="logos">
        <i class="fa-brands fa-cc-visa" title="Visa"></i>
        <i class="fa-brands fa-cc-mastercard" title="Mastercard"></i>
        <i class="fa-solid fa-mobile-screen-button" title="Mobile Money"></i>
    </div>

    <form method="POST" action="{{ route('payment.process') }}">
        @csrf
        <input type="hidden" name="heritage_id" value="{{ $heritage_id ?? 1 }}">
        <input type="hidden" name="amount" value="{{ $amount ?? 1000 }}">

        <div>
            <label>Email</label>
            <input type="email" name="email" required placeholder="exemple@domaine.com">
        </div>

        <div>
            <label>Numéro de carte</label>
            <input type="text" name="card_number" required placeholder="1234 5678 9012 3456">
        </div>

        <div class="card-details">
            <input type="text" name="card_exp_month" required placeholder="MM">
            <input type="text" name="card_exp_year" required placeholder="YY">
            <input type="text" name="card_cvc" required placeholder="CVC">
        </div>

        <button type="submit">Payer maintenant</button>
    </form>
</div>

<div class="footer">
    &copy; 2021-2025 ANPT - Portail du patrimoine culturel du Bénin
</div>

</body>
</html>
