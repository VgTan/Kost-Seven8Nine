<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Contact Us</title>
    <link rel="stylesheet" href="/css/admincontactus.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('admin.navbar')
    <h2>Contact Us Form Submissions</h2>
    <div class="container-admin">
        <div class="container_size">
            <div class="details">
                <div class="branch1-count">
                    <p>{{ COUNT($contact) }}</p>
                    <span>Branch(es)</span>
                </div>
            </div>

            <div class="contactus">
                @if(!$contact->isEmpty())
                <table class="table_admin">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contact as $con)
                        <tr>
                            <th scope="row">{{ $con->id }}</th>
                            <td>{{ $con->name }}</td>
                            <td>{{ $con->phone }}</td>
                            <td>{{ $con->email }}</td>
                            <td>{{ $con->subject }}</td>
                            <td>{{ $con->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="no-message">No Message</div>
                @endif
            </div>
        </div>
    </div>

</body>

</html>