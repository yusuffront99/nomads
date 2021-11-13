@extends('layouts.checkout')

@section('title', 'Checkout')
@section('content')
    <!-- Main -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    Checkout
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details mb-2">
                            <h1>Who is going ?</h1>
                            <p>
                                Trip to Ubud, Bali, Indonesia
                            </p>

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="frontend/images/members3.png" alt=""></td>
                                            <td>Yusuf</td>
                                            <td>ID</td>
                                            <td>N/A</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="">
                                                    <img src="frontend/images/ic_remove.png" alt="remove">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="frontend/images/members3.png" alt=""></td>
                                            <td>Yusuf</td>
                                            <td>ID</td>
                                            <td>N/A</td>
                                            <td>Active</td>
                                            <td>
                                                <a href="">
                                                    <img src="frontend/images/ic_remove.png" alt="remove">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="members mt-3">
                                <h3>Add Member</h3>
                                <form action="" class="form-inline">
                                    <label for="inputUsername" class="sr-only">Name</label>
                                    <input type="text" name="inputUsername" id="inputUsername" class="form-control mb-2 mr-sm-2" placeholder="Username">

                                    <label for="inputVisa" class="sr-only">Visa</label>
                                    <select name="inputVisa" id="inputVisa" class="custom-select mb-2 mr-sm-2">
                                        <option value="VISA" selected>VISA</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="N/A">N/A</option>
                                    </select>

                                    <label for="doePassport"class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" name="doePassport" id="doePassport" class="form-control datepicker" placeholder="DOE Passport">
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>

                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in Nomads.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        22 Agustus 2021
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additonial VISA</th>
                                    <td width="50%" class="text-right">
                                        $ 190,00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        $ 80,00 / Person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        $ 280,00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="60%">Total (+Unique Code)</th>
                                    <td width="60%" class="text-right">
                                        <span class="text-blue"> $ 279,</span><span class="text-orange">33</span>
                                    </td>
                                </tr>
                            </table><hr>
                            <h2>Payment Instruction</h2>
                            <p class="payment-instructions">
                                Please complete your payment before to 
                                continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="frontend/images/ic_bank.png" alt="bank" class="bank-image">
                                    <div class="descriptions">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0809080911
                                            <br>
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="frontend/images/ic_bank.png" alt="bank" class="bank-image">
                                    <div class="descriptions">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0809110911
                                            <br>
                                            Bank ABC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="success.html" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush
@push('prepend-script')
<script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function(){
        // date picker
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons : {
                rightIcon : '<img src="frontend/images/ic_doe.png">'
            }
        })
    })
</script>
@endpush