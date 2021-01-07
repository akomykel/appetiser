<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row border-bottom">
                    <div class="col-lg-12 p-2"><h2>Jul 2018</h2></div>
                </div>

                <div class="row border-bottom" v-for="ad in arrDays" :key="ad.day">
                    <div class="col-lg-1 p-2">{{ ad.day }}</div>
                    <div class="col-lg-2 p-2">{{ ad.lbl }}</div>
                    <div class="col-lg-9 p-2"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('List event component mounted')
        },
        computed: {
            arrDays:function(){
                var x = 0;
                var arrDays = [];
                var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                for(var i=1; i<=31; i++) {
                    (x == 7) ? x = 0 : x = x;
                    arrDays.push({ day:i, lbl:days[x] });
                    x++;
                }

                return arrDays;
            }
        }
    }
</script>
