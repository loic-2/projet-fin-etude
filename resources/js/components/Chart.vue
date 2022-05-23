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
// Import the `generateChart()` method to create the vue component.
import { generateChart } from 'vue-chartjs/legacy'
// Import needed controller from Chart.js
import { LineController } from 'chart.js'

// 3. Extend one of the default charts
class LineWithLineController extends LineController{}
// The first argument is the chart-id, the second the chart type, third is the custom controller
const CustomLine = generateChart('custom-line', 'line', LineWithLineController)

/*import of bar-chart */
import { Chart as ChartJS, Title, Tooltip,Filler, Legend, BarElement, CategoryScale, LinearScale, LineElement, PointElement } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, Filler,BarElement, CategoryScale, LinearScale,LineController,LineElement,PointElement)
export default {
  name: 'BarChart',
  components: { CustomLine },
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
            data: [40, 20, 12, 20, 35, 14, 9, 12, 25, 19, 27, 42], 
            label:"Visite",
            backgroundColor:"rgba(0,0,255,0.2)",
            pointBackgroundColor:"rgba(0,0,255,0.8)",
            borderColor:"rgba(0,0,255,0.6)",
            fill:true,
             },
        ]
      },
      chartOptions: {
        responsive: true,
        lineTension:0.4,
        scales:{
            y:{
                type:'linear',
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