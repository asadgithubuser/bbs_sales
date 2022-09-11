<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainee Certificate</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style>

    /* certificate css  */
.col-md-9.certbody-text {
  margin: 0 auto;
}
table.table {
    margin: 50px 0px;
}

.row.mt-5 {
    margin: 50px 0px;
}

.row.certarea-body {
  display: grid;
  width: 100%;
}

.cirtificate-titile {
  text-align: center;
  margin: 50px 0px;
}
.first-row {
  margin: 40px 0px;
}
.header-text ul {
    list-style: none;
    text-align: center;
}

li.govt-name {
    font-size: 19px;
}

li.govt-dept-name {
    font-size: 26px;
    font-weight: 600;
}

li.address {
    font-size: 16px;
    font-weight: 600;
}

li.dept-url {
    font-size: 15px;
}
.header-footer.col-01 h3 {
    padding-top: 32px;
}

.container {
    position: relative;
}

.container>img {
    position: absolute;
    top: 29%;
    left: 35%;
    width: 33%;
    opacity: .4;
}

.cirtificate-body {
    margin: 200px 0px;
}
tr.thead-name th {
    text-align: center;
}

</style>
</head>
<body>
    <div class="container">
    <img src="{{ asset('assets/certificate/bbs.jpeg') }}" />
        <div class="row first-row">
            <div class="col-md-2">
                <div class="header-top img-left">
                    <img src="{{ asset('assets/certificate/img-left.png') }}" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="header-text">
                    <ul>
                        <li class="govt-name">People's Republic of Bangladesh</li>
                        <li class="govt-dept-name">Local Government Institute of Bangladesh</li>
                        <li class="address">29, Agargaon, Sher-E-Bangla Nagar, Dhaka-1207</li>
                        <li class="dept-url">www.nilg.gov.bd</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="header-top img-right">
                <img src="{{ asset('assets/certificate/img-right.png') }}" />
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <div class="cirtificate-titile">
                    <h2>Certificate</h2>
                </div>
            </div>
        </div>
        <div class="row certarea-body">
            <div class="col-md-9 certbody-text ">
                <div class="cirtificate-body ">
                    <p>Mr. Maifur Rahman, UP Member (General), Union-Urikarchar, Upazila-Raozan,
                District-Chamham, from 01 April 2022 to 30 April 2022.
                Government Initiatives (NILs)
                "Law and Rule" (Clock No. 71).</p>
                </div>
                <div class="cirtificate-body-table mt-4 mb-4">
                    <table class="table table-bordered text-center table-striped">
                        <tr class="thead-name">
                            <th>Mark</th>
                            <th>Point</th>
                            <th>Grade</th>
                        </tr>
                        <tr>
                            <td>780</td>
                            <td>A+</td>
                            <td>PASS</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="header-footer col-01">
                    <div class="footer-img">
                        <h3>03/08/2022</h3>
                    </div>
                    <h3>Date</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-footer col-01">
                    <div class="footer-img">
                    <img src="{{ asset('assets/certificate/sign.png') }}" />
                    </div>
                    <h3>Course Director</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-footer col-01">
                    <div class="footer-img">
                    <img src="{{ asset('assets/certificate/sign.png') }}" />
                    </div>
                    <h3>Director
        (Training & Advice)</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header-footer col-01">
                    <div class="footer-img">
                        <img src="{{ asset('assets/certificate/sign.png') }}" />
                    </div>
                    <h3>Director General</h3>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>