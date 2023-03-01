<template>
    <div style="width: 1000px; height: 500px">
      <canvas ref="myChart"></canvas>
    </div>
</template>

<script>
import axios from 'axios';
import Chart from 'chart.js/auto';

export default {
name: 'Chart',
props: {
    showOddYears: Boolean,
    chartKey: String
},
data() {
    return {
        chart: null,
        chartData: [],
        chartLabels: [],
        chartOptions: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    min: 1000
                },
            },
        },
    };
},
watch: {
    showOddYears: function() {
        this.destroyChart();
        this.fetchData();
    },
    chartKey: function() {
        this.destroyChart();
        this.fetchData();
    }
},
methods: {
    fetchData() {
        axios
            .get('http://localhost:8000/api/production')
            .then((response) => {
                let data = response.data;

                if (this.showOddYears) {
                    data = data.filter((item) => item.year % 2 === 0);
                }

                this.chartData = data.map((item) => item.value);
                this.chartLabels = data.map((item) => item.year);

                this.createChart();
            })
            .catch((error) => {
                console.log(error);
            });
    },
    createChart() {
        const ctx = this.$refs.myChart.getContext('2d');

        this.chart = new Chart(ctx, {
            type: 'line',
            data: {
            labels: this.chartLabels,
            datasets: [
                {
                label: 'Value',
                data: this.chartData,
                backgroundColor: "#ff335e",
                borderColor: "gray",
                fill: true
                },
            ],
            },
            options: this.chartOptions,
        });
    },
    destroyChart() {
        if (this.chart) {
            this.chart.destroy();
            this.chart = null;
        }
    }
},
mounted() {
    this.fetchData();
},
};
</script>

<style>
*,*:after,*:before{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
}
body{
	font-family: arial;
	font-size: 16px;
	margin: 0;
	background: #fff;
	color: #000;
	display: flex;
	justify-content: space-around;
	align-items: center;
	min-height: 100vh;
}

.container{
	width: 70%;
}
h1{
	font-size: 46px;
	text-align: center;
}
#canvas{
	width: 100%;
}
</style>
