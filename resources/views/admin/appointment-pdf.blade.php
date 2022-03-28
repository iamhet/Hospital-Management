<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        .appointment-letter {
            padding: 30px 50px;

            td {
                padding: 5px 10px
            }

            table {
                width: 100%
            }
        }

    </style>
    <title>Appointment Pdf</title>
</head>

<body>
    <div class="appointment-letter">
        <p style="text-align: center;font-size:20px">DEVINE HOSPITAL
        </p>
        
        <p>Mr. ƒ Ms. {{$name}} <br />
        </p>
        <p>
            Dear Applicant {{$name}},
        </p>
        
        <p> Congratulations Your appointment is approved by Devine Hospital! </p>
        <p>Further to your acceptance of the offer letter dated Date of Offer Letter, we are pleased to confirm your appointment as Designation for our Department Name at Location in Company Name . </p>
        <p> Please make note of the following important terms and conditions of your employment: </p>
        <p>Commencement of employment: You have joined our services on date of joining and the said date has been recorded as your Date of Joining and will be considered as such for all future purposes pertaining to your employmentƒassociation with us.</p>
        <p>Compensation & Benefits: Please refer to Annexure I, for details of your remuneration and benefits as applicable to you. The aforesaid CTC is subject to applicable taxes and statutory deductions that may prevail from time to time.</p>
        
       
        <p>Wish you a successful professional stint with us. We look forward to a mutually beneficial and enriching
            experience having you on board. All the best!</p>
        <p>Warm Regards,<br />
            For Devine Hospital
        </p>
        <p>{{$name}},<br />
            Authorised Signatory Designation
        </p>
        <p>
        <div style="float:right;width:30%;">I have read the above terms and conditions of my appointment. I accept the same.<br />
            _____________________ <br />
            {{$name}}<br />
        </div>
        </p>
        <br>
        <div>
        <table class="table table-success table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$name}}</td>
                <td>{{$email}}</td>
                <td>{{$date}}</td>
                <td>{{$status}}</td>
              </tr>
              
            </tbody>
          </table>
        </div>

    </div>
</body>

</html>
