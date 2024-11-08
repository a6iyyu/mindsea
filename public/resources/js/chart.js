document.addEventListener("DOMContentLoaded", () => {
    const progressCtx = document
        .getElementById("progressChart")
        .getContext("2d");
    new Chart(progressCtx, {
        type: "doughnut",
        data: {
            labels: ["Selesai", "Dalam Progress", "Belum Dimulai"],
            datasets: [
                {
                    data: [45, 35, 20],
                    backgroundColor: ["#22c55e", "#f59e0b", "#e5e7eb"],
                    borderWidth: 0,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "bottom",
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.label + ": " + context.parsed + "%";
                        },
                    },
                },
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        },
    });

    const subjectCtx = document
        .getElementById("subjectProgress")
        .getContext("2d");
    new Chart(subjectCtx, {
        type: "bar",
        data: {
            labels: ["Matematika", "IPA", "B. Indonesia"],
            datasets: [
                {
                    label: "Progress (%)",
                    data: [85, 60, 75],
                    backgroundColor: ["#3b82f6", "#8b5cf6", "#22c55e"],
                    borderWidth: 0,
                    borderRadius: 5,
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function (value) {
                            return value + "%";
                        },
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return (
                                context.dataset.label +
                                ": " +
                                context.parsed.y +
                                "%"
                            );
                        },
                    },
                },
            },
            animation: {
                duration: 1500,
                easing: "easeInOutQuart",
            },
        },
    });
});
