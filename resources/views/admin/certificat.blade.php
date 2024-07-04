@extends('layout-app.admin-app.appadmin')
@section('title', 'Tableau de bord')
@section('content')
@include('layout-app.admin-app.headeradmin')
<div class="container-fluid page-body-wrapper">
  @include('layout-app.admin-app.side-bar')
    <style>
        .certificate {
            border: 10px solid #000;
            padding: 20px;
            width: 850px;
            margin: 20px auto;
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
        .header img {
            width: 100px;
        }
        .header div {
            text-align: center;
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
        <img src="{{ asset('assets1/images/img/images/images.png') }}" alt="logo" />

        <div>
            <h1>ETABLISSEMENT ESET MARRAKECH</h1>
            <h2>Diplôme de Technicien Spécialisé</h2>
        </div>
        <img src="{{ asset('assets1/images/img/images/accred.png') }}" alt="logo" />

    </div>

    <div class="watermark">CERTIFIED</div>

    <div class="main-content">
        <p>Vu la loi n° 13.00 portant statut de la formation professionnelle privée promulguée par le Dahir n° 1-00-207 du 15 safar 1421 (19 mai 2000);</p>
        <p>Vu le décret n° 2.00.1018 du 25 rabii I 1422 (18 juin 2001) pris pour l'application de la loi n° 13.00;</p>
        <p>Vu l’arrêté du Ministre de l’Emploi, de la Formation professionnelle, du Développement Social et de la Solidarité n° 73-00 du 17 Kaada 1422 (16 janvier 2002) relatif aux établissements de formation professionnelle privés;</p>
        <p>Vu l’autorisation d’ouverture de l’établissement délivrée le 27/09/2004 sous le n° 11/03/2/2004;</p>
        <p>Vu la décision d’accréditation n° 2/DFP/2008 du 13/11/2008;</p>
        <p>Vu le procès-verbal de la délibération des examens du 03/09/2021;</p>

        <p>M. / Mlle <strong>[Nom de l'étudiant]</strong>,</p>
        <p>Né(e) le <strong>[Date de naissance]</strong>,</p>
        <p>Titulaire de la CIN n° <strong>[CIN]</strong>, Nationalité <strong>[Nationalité]</strong>,</p>
        <p>Inscrit(e) à l'établissement sous le n° <strong>[Numéro d'inscription]</strong>,</p>
        <p>A subi avec succès les épreuves pour l'obtention du diplôme de:</p>

        <h2>Technicien Spécialisé en <strong>[Spécialité]</strong></h2>
        <p>Promotion: [Année]</p>

        <p>En foi de quoi, le présent diplôme lui a été délivré pour servir et valoir ce que de droit.</p>
        <p>Fait à MARRAKECH le <strong>[Date de délivrance]</strong></p>
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

@endsection