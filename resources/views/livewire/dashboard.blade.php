<div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-scroll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total blog terpublish</h4>
                    </div>
                    <div class="card-body">
                        {{$data['blog']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-scroll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total RAB disetujui</h4>
                    </div>
                    <div class="card-body">
                        {{$data['rab']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-scroll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total SPJ disetujui</h4>
                    </div>
                    <div class="card-body">
                        {{$data['spj']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-scroll"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total report masuk</h4>
                    </div>
                    <div class="card-body">
                        {{$data['report']}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$status}}</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <button wire:click="incomes" class="btn {{$status=="Pemasukan"?'btn-primary':''}}">
                                Pemasukan
                            </button>
                            <button wire:click="outcomes" class="btn {{$status=="Pengeluaran"?'btn-primary':''}}">
                                Pengeluaran
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="140"></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <div class="detail-value">
                                Rp. {{number_format(($money['day']!=null)?$money['day'][0]->money:0,2)}}</div>
                            <div class="detail-name">Pengeluaran hari ini</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">
                                Rp. {{number_format(($money['week']!=null)?$money['week'][0]->money:0,2)}}</div>
                            <div class="detail-name">Pengeluaran minggu ini</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">
                                Rp. {{number_format(($money['month']!=null)?$money['month'][0]->money:0,2)}}</div>
                            <div class="detail-name">Pengeluaran bulan ini</div>
                        </div>
                        <div class="statistic-details-item">
                            <div class="detail-value">
                                Rp. {{number_format(($money['year']!=null)?$money['year'][0]->money:0,2)}}</div>
                            <div class="detail-name">Pengeluaran tahun ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('fresh', () => {
            var statistics_chart = document.getElementById("myChart").getContext('2d');
            var data = [];
            var labels = [];
            var max = 1;
            var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            let a = @this.outcome;
            if (a != null) {
                a.forEach(function (item, index, array) {
                    if (max < item.money) {
                        max = item.money;
                    }
                    data.push(item.money);
                    labels.push(month[item.bulan - 1]);
                });
            }
            var stepSize = Math.pow(10, max.toString().length)
            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pengeluaran',
                        data: data,
                        borderWidth: 5,
                        borderColor: '#6777ef',
                        backgroundColor: '#6777ef44',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6777ef',
                        pointRadius: 10
                    }]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            label:
                                function (tooltipItem, data) {

                                    const val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return 'Rp. ' + numeral(val).format('0,0.00');
                                }
                        }
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                stepSize: stepSize,
                                callback: function (value) {
                                    return 'Rp. ' + numeral(value).format('0,0.00')
                                }
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            },
                            ticks: {
                                stepSize: stepSize,
                            },
                        }]
                    },
                }
            });
        });
    });

</script>

