<template>
    <CustomLine
    :chart-options="chartOptions"
    :chart-data="chartData"
    :chart-id="chartId"
    :dataset-id-key="datasetIdKey"
    :plugins="plugins"
    :css-classes="cssClasses"
    :styles="styles"
    :width="width"
    :height="height"
    />   
</template>

<script>
import { Chart } from 'chart.js'
// 2. Import the `generateChart()` method to create the vue component.
import { generateChart } from 'vue-chartjs/legacy'
// 3. Import needed controller from Chart.js
import { LineController } from 'chart.js'

// 3. Extend one of the default charts
// http://www.chartjs.org/docs/latest/developers/charts.html
class LineWithLineController extends LineController { /* custom magic here */}

// 4. Generate the vue-chartjs component
// The first argument is the chart-id, the second the chart type, third is the custom controller
const CustomLine = generateChart('custom-line', 'line', LineWithLineController)

/*import of bar-chart */
import {Bar} from 'vue-chartjs/legacy'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale, LineElement, PointElement } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale,LineController,LineElement,PointElement)
export default {
  name: 'BarChart',
  components: { Bar,CustomLine },
  props: {
    chartId: {
      type: String,
      default: 'bar-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 150
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      chartData: {
        type:"line",
        labels: [ 'Janvier', 'Fevrier', 'Mars', 'Avril','Mai','Juin','Juillet','Aout','Septembre'
        ,'Octobre','Novembre','Decembre' ],
        datasets: [ {
            type:"line",
            data: [40, 20, 12, 20, 35, 14, 9, 12, 25, -19, 27, 42], 
            label:"Visite",
            backgroundColor:"#364312",
            borderColor:"blue",
            fill:'origin',
             },
        ]
      },
      chartOptions: {
        responsive: true,
        lineTension:0.4,
        scales:{
            y:{
                beginAtZero:true,
            }
        },
        animations: {
            tension: {
                duration: 1000,
                easing: 'linear',
                from: 1,
                to: 0.4,
                loop: true
            }
        }
      }
    }
  }
}
</script>