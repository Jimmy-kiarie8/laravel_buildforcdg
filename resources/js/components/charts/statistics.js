import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
  data: () => ({
    chartdata: {
      labels: ['January', 'February', 'March', 'April', 'May'],
      datasets: [
        {

          label: 'Data One',
          backgroundColor: 'grey',
          data: [40, 20, 30, 32, 43]
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  }),

  mounted () {
    this.renderChart(this.chartdata, this.options)
  }
}