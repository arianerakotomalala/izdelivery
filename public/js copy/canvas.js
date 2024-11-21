// Configuration du contexte pour le graphique
const ctx = document.getElementById('orderChart').getContext('2d');

// Dégradé de couleurs pour un effet moderne
const gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(240, 142, 107, 0.8)');
gradient.addColorStop(1, 'rgba(240, 142, 107, 0)');

// Données pour le graphique
const data = {
    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
    datasets: [{
        label: 'Nombre de Commandes',
        data: [30, 45, 60, 80, 70, 90, 100, 85, 75, 95, 110, 130], // Exemples de données mensuelles
        backgroundColor: gradient,
        borderColor: '#f08e6b',
        borderWidth: 2,
        pointBackgroundColor: '#fff',
        pointBorderColor: '#f08e6b',
        tension: 0.4 // Lissage des lignes
    }]
};

// Configuration du graphique
const config = {
    type: 'line', // Changer en 'bar' pour un graphique en barres
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    color: '#495057',
                    font: {
                        size: 14
                    }
                }
            },
            tooltip: {
                enabled: true,
                backgroundColor: '#f08e6b',
                titleFont: { size: 16 },
                bodyFont: { size: 14 },
                padding: 10
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#6c757d'
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(108, 117, 125, 0.1)'
                },
                ticks: {
                    color: '#6c757d'
                }
            }
        }
    }
};

// Initialisation du graphique
const orderChart = new Chart(ctx, config);
