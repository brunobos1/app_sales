<template>

    <div class="temp-container">
        <h1>Sales Analysis</h1>
    </div>

    <div class="dashboard">

      <production-table :show-odd-years="showOddYears" />
      <chart :show-odd-years="showOddYears" />

    </div>

    <div class="temp-container">
        <button @click="toggleOddYears" type="button" class="btn btn-danger btn-lg">Toggle Odd Years</button>
    </div>

</template>

<script>
import Chart from './Chart.vue'
import ProductionTable from './ProductionTable.vue'

export default {
    name: 'Dashboard',
    components: {
        ProductionTable,
        Chart
    },
    data() {
        return {
        showOddYears: false
        }
    },
    methods: {
        toggleOddYears() {
            this.showOddYears = !this.showOddYears
        }
    }
}
</script>

<style>
.dashboard {
  display: flex;
  flex-wrap: wrap;
}

.temp-container {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 3%;
    font-family: 'Open Sans', sans-serif;
}
</style>
