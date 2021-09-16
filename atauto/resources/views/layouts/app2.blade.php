<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AT Auto IMS</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body onload=display_ct();>
    <header>
        <div>
            <span class="pl-5">AT Auto <i class="fas fa-tools"></i></span>
            <div class="dropdown show pr-5" style="float: right;">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->username}}
                </a>
              
                <div class="dropdown-menu ddmenu" aria-labelledby="dropdownMenuLink">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">{{ __('Logout') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <nav>
        <div class="sidebar shadow p-3">
            <ul>
                <li>
                    <a href="/customer.clientView"><span>Products</span></a>
                </li>

                <li>
                    <a href="/customer.myCart">
                        <span>Shopping Cart</span>
                    </a>
                </li>
                <li>
                    <a href="/customer.myorder"><span>To Pay</span></a>
                </li>

                <li>
                    <a href="/order.history"><span>Order History</span></a>
                </li>
                <li>
                    <a href="customer.aboutus"><span>About Us</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content2')
    </main>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script type="text/javascript"> 
    function display_c(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct()',refresh)
    }
    
    function display_ct() {
        var today = new Date()
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var day = today.getDay()
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        h = checkHours(h);
        m = checkTime(m);
        s = checkTime(s);
        var time = h + ":" + m + ":" + s;
        var weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        document.getElementById("day").innerHTML = weekday[day];
        document.getElementById("currentDate").innerHTML = date;
        document.getElementById("time").innerHTML = time + " PM";
        display_c();
    }

    function checkHours(i) {
        if (i > 12) {i = i - 12};
        return i;
    }

    function checkTime(i) {
        if (i < 10) {i = "0" + i};
        return i;
    }
</script>

<script>
    var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ 
          data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478,200,100],
          borderColor: "#e91f63",
          fill: false
        }, { 
          data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000,11234,12315],
          borderColor: "#61c688",
          fill: false
        }, { 
          data: [300,700,2000,5000,6000,4000,2000,1000,200,100,12397,128],
          borderColor: "#57addd",
          fill: false
        }]
      },

      options: {
        legend: {display: false},
      
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "white",
                }
            }],

            xAxes: [{
                ticks: {
                    fontColor: "white",
                }
            }] 
        }
      }
    });
    </script>
</html>