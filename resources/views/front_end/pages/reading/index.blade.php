<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexa's Zindabazar Partial</title>
    
    <script src="{{ asset('js/disable-find.js') . '?v=20260831b' }}"></script>
    <!-- Material Icons CSS (Fixed Link) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
           body{
            background-color: #d4f5ee;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        /* Container for the buttons */
        .button-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Styling for each button */
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
            /* width: 200px;  */
            text-align: center;
        }

        .btn i {
            margin-right: 10px;
            
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Optional: Add a heading style */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 30px;

        }

        /* Horizontal line above footer */
        hr {

            border-top: 1px solid #ccc;
        }

        /* Media Query for small devices */
        @media (max-width: 768px) {
           
            .nav{
                justify-content: center;
            }
        }

        /* Media Query for larger devices */
        @media (min-width: 769px) {
            .button-container {
                max-width: 900px; 
            }

            
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="logo">
             <img src="{{asset('images/new logo.png')}}" width="140px" alt="Logo">
        </div>

    </div>
    <div class="container">
        <div class="wrap">
            <h1>Reading  Module</h1>
            @if(!isset($allowed) || $allowed)
            <div class="button-container">
                <!-- Reading Category Buttons -->
                 
                <a href="{{url('/reading/gt')}}" class="btn">
                    <i class="material-icons-outlined">book</i>GT
                </a>
                <a href="{{url('/reading/academic')}}" class="btn">
                    <i class="material-icons-outlined">book</i>Academic
                </a>
            </div>
            @else
  <p style="text-align:center; margin-top:20px;">
    This course is not available for your batch yet.
  </p>
@endif
        </div>
    </div>
    <hr>
    <div class="footer">
        <p>Copyright © All rights reserved. Hexa's Zindabazar</p>
    </div>
</body>

</html>
