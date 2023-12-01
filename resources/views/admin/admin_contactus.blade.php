<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Contact Us</title>
    <link rel="stylesheet" href="admin.css" />
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
                        <p>{{ COUNT($branch) }}</p>
                        <span>Branch(es)</span>
                    </div>

                    <div class="room1-count">
                        <p>{{ COUNT($branchroom) }}</p>
                        <span>Room(s)</span>
                    </div>

                    <div class="user1-count">
                        <p>{{ COUNT($user) }}</p>
                        <span>User(s)</span>
                    </div>
            </div>

            <div class="contactus">
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
                        <tr>
                        <th scope="row">1</th>
                        <td>Person 1</td>
                        <td>08190812345</td>
                        <td>person1@gmail.com</td>
                        <td>Can't login to my previous account</td>
                        <td>Hello, my name is person1. gbisa login ini gue kenapa ya? test hehe</td>
                        </tr>

                        <tr>
                        <th scope="row">2</th>
                        <td>Person 2</td>
                        <td>08190812344</td>
                        <td>person2@gmail.com</td>
                        <td>the website is crashing</td>
                        <td>Hello, my name is person2. send help? test hehe</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>

</html>
