<template>
<div class="card" >
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Year</th>
            <th>Value</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in filteredItems" :key="item.year">
            <td>{{ item.year }}</td>
            <td>{{ item.value }}</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
</template>

<script>
export default {
    name: "ProductionTable",
    data() {
        return {
        items: [],
        };
    },
    computed: {
        filteredItems() {
        return this.items.filter((item) => {
            return this.showOddYears ? item.year % 2 === 0 : true;
        });
        },
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
        const response = await fetch("http://localhost:8000/api/production");
        const data = await response.json();
        this.items = data;
        },
    },
    props: {
        showOddYears: Boolean,
    },
};
</script>

<style>
.container {
  max-width: 960px;
  margin: 0 auto;
}

.table-responsive {
  overflow-x: auto;
}

th {
    color: #ff335e;
}

.card {
    margin-right: 50px;
}
</style>
