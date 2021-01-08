<template>
    <div>
        <div class="row">
            <!-- Form -->
            <div class="col-lg-5">
                <!-- Event -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Event</label>
                            <input type="text" id="eventTitle" name="eventTitle" class="form-control" v-model="form.eventTitle" />
                        </div>
                    </div>
                </div>

                <!-- From-To -->
                <div class="row mt-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>From</label>
                            <date-picker valueType="format" id="dateFrom" name="dateFrom" v-model="form.eventDateFrom"></date-picker>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>To</label>
                            <date-picker valueType="format" id="dateTo" name="dateTo" v-model="form.eventDateTo" ></date-picker>
                        </div>
                    </div>
                </div>

                <!-- Days -->
                <div class="row mt-1">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkMon" value="Mon" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkMon">Mon</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkTue" value="Tue" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkTue">Tue</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkWed" value="Wed" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkWed">Wed</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkThu" value="Thu" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkThu">Thu</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkFri" value="Fri" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkFri">Fri</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkSat" value="Sat" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkSat">Sat</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="chkSun" value="Sun" v-model="form.eventDays">
                                    <label class="form-check-label" for="chkSun">Sun</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <button v-on:click="submitForm()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>


            <!-- Display List -->
            <div class="col-lg-7">
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
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    export default {
        data() {
            return {
                api_url: 'http://localhost:8000/api',
                form: {
                    eventTitle: '',
                    eventDateFrom: '',
                    eventDateTo: '',
                    eventDays: []
                }
            };
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
        },
        methods: {
            submitForm(){
                axios.post(this.api_url + '/event', this.form)
                    .then((res) => {
                        console.log('Saved successfully');
                        console.log(res);
                    })
                    .catch((error) => {
                        console.log('Error found');
                        console.log(error);
                    });

                this.showListEvents()
            },
            showListEvents() {
                axios.get(this.api_url + '/events')
                    .then((res) => {
                        console.log(res);
                    })
            }
        },
        components: { 
            Datepicker 
        },
    }
</script>