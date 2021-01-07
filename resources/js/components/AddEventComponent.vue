<template>
    <div class="container">
        <!-- Event -->
        <div class="row">
            <div class="col-lg-12">
                <div><label>Event</label></div>
                <div><input type="text" id="eventTitle" name="eventTitle" class="form-control" /></div>
            </div>
        </div>

        <!-- From-To -->
        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>From</label>
                    <date-picker v-model="dateFrom" valueType="format" id="dateFrom" name="dateFrom" class="dPicker"></date-picker>
                    <!-- <input type="text" id="dateFrom" name="dateFrom" class="form-control" /> -->
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label>To</label>
                    <date-picker v-model="dateTo" valueType="format" id="dateTo" name="dateTo" class="dPicker"></date-picker>
                    <!-- <input type="text" id="dateTo" name="dateTo" class="form-control" /> -->
                </div>
            </div>
        </div>

        <!-- Days -->
        <div class="row mt-1">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkMon">
                            <label class="form-check-label" for="chkMon">Mon</label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkTue">
                            <label class="form-check-label" for="chkTue">Tue</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkWed">
                            <label class="form-check-label" for="chkWed">Wed</label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkThu">
                            <label class="form-check-label" for="chkThu">Thu</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkFri">
                            <label class="form-check-label" for="chkFri">Fri</label>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkSat">
                            <label class="form-check-label" for="chkSat">Sat</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkSun">
                            <label class="form-check-label" for="chkSun">Sun</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="row mt-2">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    export default {
        mounted() {
            console.log("Add event component mounted")
        },
        data() {
            return {
                dateFrom: null,
                dateTo: null,
            };
        },
        components: { Datepicker },
    }
</script>

<style>
    .dPicker {
        width: 150;
    }
</style>