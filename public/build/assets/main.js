function CheckForMinus() {
    if(document.getElementById('income').value.split('')[0] == "-") {
        document.getElementById('checkbox1').checked = false;
        document.getElementById('checkbox1').value = 0;
    }
    else {
        document.getElementById('checkbox1').checked = true;
        document.getElementById('checkbox1').value = 1;
    }
}

const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: [new Date().getDate()-5, new Date().getDate()-4, new Date().getDate()-3, new Date().getDate()-2, new Date().getDate()-1, new Date().getDate()],
      datasets: [{
        label: 'Доход',
        data: [12, 19, 3, 5, 2, 3],
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