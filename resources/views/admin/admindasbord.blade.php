@extends('layout-app.admin-app.appadmin')
@section('title', 'Tableau de bord')
@section('content')
@include('layout-app.admin-app.headeradmin')
<div class="container-fluid page-body-wrapper">
  @include('layout-app.admin-app.side-bar')
  <div class="main-panel">
    <style>
      body {
          font-family: Arial, sans-serif;
          background-color: #f8f9fa;
      }
      .container-fluid {
          padding: 20px;
      }
      .card {
          margin-bottom: 20px;
          border-radius: 10px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      .card-header {
          background-color: #007bff;
          color: white;
          border-radius: 10px 10px 0 0;
      }
      .stat-card {
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 20px;
          color: #fff;
          border-radius: 10px;
      }
      .stat-card i {
          font-size: 2.5rem;
      }
      .stat-card.blue {
          background-color: #007bff;
      }
      .stat-card.green {
          background-color: #28a745;
      }
      .stat-card.yellow {
          background-color: #ffc107;
      }
      .stat-card.red {
          background-color: #dc3545;
      }
      .chart-container {
          height: 400px;
          margin-bottom: 20px;
      }
      .activity-feed {
          max-height: 400px;
          overflow-y: auto;
      }
      .activity-feed .feed-item {
          display: flex;
          align-items: center;
          margin-bottom: 15px;
      }
      .activity-feed .feed-item i {
          font-size: 1.5rem;
          margin-right: 15px;
      }
      .activity-feed .feed-item .feed-text {
          flex-grow: 1;
      }
  </style>
</head>
<body>
  <div class="container-fluid">
      <h1 class="mt-4">Tableau de bord Administrateur</h1>
      <p>Bienvenue sur le tableau de bord administrateur. Ici, vous pouvez gérer tous les aspects de votre plateforme.</p>

      <div class="row">
          <div class="col-lg-4 col-md-6">
              <div class="card stat-card blue">
                  <div>
                      <h3>Utilisateurs</h3>
                      <p>1 234</p>
                  </div>
                  <i class="fas fa-users"></i>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="card stat-card green">
                  <div>
                      <h3>Cours</h3>
                      <p>567</p>
                  </div>
                  <i class="fas fa-book"></i>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
              <div class="card stat-card yellow">
                  <div>
                      <h3>Revenu</h3>
                      <p>12 345 $</p>
                  </div>
                  <i class="fas fa-dollar-sign"></i>
              </div>
          </div>
          {{-- <div class="col-lg-3 col-md-6">
              <div class="card stat-card red">
                  <div>
                      <h3>Erreurs</h3>
                      <p>5</p>
                  </div>
                  <i class="fas fa-exclamation-triangle"></i>
              </div>
          </div> --}}
      </div>

      <div class="row">
          <div class="col-lg-8">
              <div class="card">
                  <div class="card-header">
                      <h5>Trafic du site web</h5>
                  </div>
                  <div class="card-body chart-container">
                      <canvas id="trafficChart"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="card">
                  <div class="card-header">
                      <h5>Activité récente</h5>
                  </div>
                  <div class="card-body activity-feed">
                      <div class="feed-item">
                          <i class="fas fa-user-plus text-primary"></i>
                          <div class="feed-text">
                              <p><strong>John Doe</strong> s'est inscrit.</p>
                              <small>Il y a 2 heures</small>
                          </div>
                      </div>
                      <div class="feed-item">
                          <i class="fas fa-book-open text-success"></i>
                          <div class="feed-text">
                              <p><strong>Jane Smith</strong> a terminé un cours.</p>
                              <small>Il y a 3 heures</small>
                          </div>
                      </div>
                      <div class="feed-item">
                          <i class="fas fa-dollar-sign text-warning"></i>
                          <div class="feed-text">
                              <p><strong>Facture #1234</strong> a été payée.</p>
                              <small>Il y a 4 heures</small>
                          </div>
                      </div>
                      {{-- <div class="feed-item">
                          <i class="fas fa-exclamation-triangle text-danger"></i>
                          <div class="feed-text">
                              <p><strong>Erreur système</strong> s'est produite.</p>
                              <small>Il y a 5 heures</small>
                          </div>
                      </div> --}}
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      const ctx = document.getElementById('trafficChart').getContext('2d');
      const trafficChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
              datasets: [{
                  label: 'Visiteurs',
                  data: [65, 59, 80, 81, 56, 55, 40],
                  backgroundColor: 'rgba(0, 123, 255, 0.2)',
                  borderColor: 'rgba(0, 123, 255, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  </script>
</div>
@endsection
