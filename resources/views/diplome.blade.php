<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplôme de Technicien Spécialisé - ESET Marrakech</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .certificate {
            border: 10px solid #000;
            padding: 10px;
            /* width: 1000px; */
            margin: auto;
            height: auto;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            position: relative;
            background: #fff;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        /* .header img {
            width: 100px;
        } */
        .header div {
            /* text-align: center; */
        }
        .certificate h1, .certificate h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .certificate p {
            font-size: 14px;
            text-align: left;
        }
        .main-content {
            margin-top: 20px;
            text-align: left;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
        .signature div {
            width: 200px;
            border-top: 1px solid #000;
            text-align: center;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            font-size: 100px;
            color: #000;
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="certificate">
    <div class="header">
        <img src="logo1.png" alt="Logo 1">
        <div>
            <h1>ETABLISSEMENT ESET MARRAKECH</h1>
            <h2>Diplôme de Technicien Spécialisé</h2>
        </div>
        <img src="logo2.png" alt="Logo 2">
    </div>

    <div class="watermark">CERTIFIED</div>

    <div class="main-content">
        <p>Vu la loi n° 13.00 portant statut de la formation professionnelle privée promulguée par le Dahir n° 1-00-207 du 15 safar 1421 (19 mai 2000);</p>
        <p>Vu le décret n° 2.00.1018 du 25 rabii I 1422 (18 juin 2001) pris pour l'application de la loi n° 13.00;</p>
        <p>Vu l’arrêté du Ministre de l’Emploi, de la Formation professionnelle, du Développement Social et de la Solidarité n° 73-00 du 17 Kaada 1422 (16 janvier 2002) relatif aux établissements de formation professionnelle privés;</p>
        <p>Vu l’autorisation d’ouverture de l’établissement délivrée le 27/09/2004 sous le n° 11/03/2/2004;</p>
        <p>Vu la décision d’accréditation n° 2/DFP/2008 du 13/11/2008;</p>
        <p>Vu le procès-verbal de la délibération des examens du {{ $tests->created_at->format('d/m/Y') }};</p>

        <p>M. / Mlle <strong>{{ $tests->user->Username }}</strong>,</p>
        <p>Né(e) le <strong>{{ $tests->user->age }}</strong>,</p>
        <p>Titulaire de la CIN n° <strong>{{ $tests->user->cin }}</strong>, Nationalité <strong>[Nationalité]</strong>,</p>
        <p>Inscrit(e) à l'établissement sous le n° <strong>[Numéro d'inscription]</strong>,</p>
        <p>A subi avec succès les épreuves pour l'obtention du diplôme de:</p>

        <h2>Technicien Spécialisé en <strong>[Spécialité]</strong></h2>
        <p>playlist: {{ $tests->playlist->name }}</p>
        <p>Promotion: [Année]</p>

        <p>En foi de quoi, le présent diplôme lui a été délivré pour servir et valoir ce que de droit.</p>
        <p>Fait à MARRAKECH le <strong>{{ $tests->created_at->format('d/m/Y') }}</strong></p>
    </div>

    <div class="signature">
        <div>
            <p>Signature du Directeur de l'établissement</p>
        </div>
        <div>
            <p>Signature du Responsable Pédagogique</p>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>