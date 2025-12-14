<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification Email - Culture Bénin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 40px 30px;
        }
        .button {
            display: inline-block;
            padding: 15px 40px;
            background-color: #16a34a;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #15803d;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">🏛️</div>
            <h1>Culture Bénin</h1>
            <p>Vérification de votre email</p>
        </div>
        
        <div class="content">
            <h2>Bonjour {{ $user->name }},</h2>
            
            <p>Bienvenue sur <strong>Culture Bénin</strong> ! 🎉</p>
            
            <p>
                Nous sommes ravis de vous compter parmi nous. Pour commencer à explorer la richesse 
                de la culture béninoise, veuillez vérifier votre adresse email en cliquant sur le bouton ci-dessous :
            </p>
            
            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">
                    ✓ Vérifier mon email
                </a>
            </div>
            
            <p>
                Si le bouton ne fonctionne pas, vous pouvez copier et coller ce lien dans votre navigateur :
            </p>
            
            <p style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; word-break: break-all;">
                <a href="{{ $verificationUrl }}" style="color: #16a34a;">{{ $verificationUrl }}</a>
            </p>
            
            <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">
            
            <p style="color: #666; font-size: 14px;">
                <strong>⚠️ Attention :</strong> Si vous n'avez pas créé de compte sur Culture Bénin, 
                veuillez ignorer cet email.
            </p>
        </div>
        
        <div class="footer">
            <p>
                © {{ date('Y') }} Culture Bénin - Tous droits réservés<br>
                Découvrez la richesse culturelle du Berceau du Vaudou
            </p>
        </div>
    </div>
</body>
</html>