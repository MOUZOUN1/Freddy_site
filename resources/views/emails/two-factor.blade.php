<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code de vérification - Culture Bénin</title>
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
        .code-box {
            background-color: #f0fdf4;
            border: 3px dashed #16a34a;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
        }
        .code {
            font-size: 48px;
            font-weight: bold;
            color: #16a34a;
            letter-spacing: 10px;
            font-family: 'Courier New', monospace;
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
        .warning-box {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">🔐</div>
            <h1>Culture Bénin</h1>
            <p>Code de vérification</p>
        </div>
        
        <div class="content">
            <h2>Votre code de vérification</h2>
            
            <p>
                Une tentative de connexion à votre compte Culture Bénin a été détectée. 
                Pour des raisons de sécurité, veuillez utiliser le code ci-dessous pour confirmer votre identité :
            </p>
            
            <div class="code-box">
                <p style="margin: 0 0 10px 0; color: #16a34a; font-weight: bold;">VOTRE CODE</p>
                <div class="code">{{ $code }}</div>
                <p style="margin: 10px 0 0 0; color: #666; font-size: 14px;">Ce code expire dans 10 minutes</p>
            </div>
            
            <p>
                <strong>📱 Comment utiliser ce code :</strong>
            </p>
            
            <ol style="padding-left: 20px;">
                <li>Retournez sur la page de vérification</li>
                <li>Entrez le code à 6 chiffres ci-dessus</li>
                <li>Cliquez sur "Vérifier"</li>
            </ol>
            
            <div class="warning-box">
                <p style="margin: 0;">
                    <strong>⚠️ Attention :</strong> Si vous n'êtes pas à l'origine de cette tentative de connexion, 
                    quelqu'un essaie peut-être d'accéder à votre compte. Dans ce cas, nous vous recommandons de 
                    changer votre mot de passe immédiatement.
                </p>
            </div>
            
            <hr style="margin: 30px 0; border: none; border-top: 1px solid #eee;">
            
            <p style="color: #666; font-size: 14px; text-align: center;">
                🔒 Pour votre sécurité, ne partagez jamais ce code avec qui que ce soit.
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