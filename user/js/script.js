// This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
var options = {
    series: [
      {
        name: "Colection",
        data: [15, 25, 27, 16, 21, 28, 23, 20, 16],
      },
      {
        name: "Expense",
        data: [5, 10, 11, 8, 17, 15, 11, 14, 19],
      },
      {
        name: "Other Transaction",
        data: [1, 3, 2, 1, 5, 4, 1, 2, 1],
      },
    ],
    chart: {
      type: "bar",
      height: 250, // make this 250
      sparkline: {
        enabled: true, // make this true
      },
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "55%",
        endingShape: "rounded",
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      show: true,
      width: 2,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
    },
    yaxis: {
      title: {
        text: "P (thousands)",
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "P " + val + " thousands";
        },
      },
    },
  };
  
  var chart = new ApexCharts(document.querySelector("#apex1"), options);
  chart.render();
  
  // Sidebar Toggle Codes;
  
  var sidebarOpen = false;
  var sidebar = document.getElementById("sidebar");
  var sidebarCloseIcon = document.getElementById("sidebarIcon");
  
  function toggleSidebar() {
    if (!sidebarOpen) {
      sidebar.classList.add("sidebar_responsive");
      sidebarOpen = true;
    }
  }
  
  function closeSidebar() {
    if (sidebarOpen) {
      sidebar.classList.remove("sidebar_responsive");
      sidebarOpen = false;
    }
  }