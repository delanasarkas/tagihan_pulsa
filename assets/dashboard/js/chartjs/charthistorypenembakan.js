var randomScalingFactor = function () {
    return Math.round(Math.random() * 100);
};

var config = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.green,
                window.chartColors.blue
            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Data Baru',
            'Data Perubahan',
            'Data Penambahan',
            'Data Terhapus'
        ]
    },
    options: {
        responsive: true
    }
};

window.onload = function () {
    var ctx = document.getElementById('chart-historypenembakan').getContext('2d');
    window.myPie = new Chart(ctx, config);
};