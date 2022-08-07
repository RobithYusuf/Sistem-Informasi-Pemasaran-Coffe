
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <!-- style css php -->
    <?php include_once 'css_style/style.php';?>
    <link href="css/profile_style.css" rel="stylesheet">
    <!-- end style css php -->
<body>
    <div id="wrapper">
        <!-- nav -->
        <?php include_once 'sidebar/nav_dashboard.php';?>
        <!-- end nav -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <!-- navbar -->
            <?php include_once 'sidebar/navbar.php';?>
            <!-- end navbar -->
            <div class="wrapper wrapper-content">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2>Profile</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a>Extra Pages</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Profile</strong>
                            </li>
                        </ol>
                    </div>
                </div>
                <br>
                <div id="content" class="content p-0">
                    <div class="profile-header">
                        <div class="profile-header-cover"></div>

                        <div class="profile-header-content">
                            <div class="profile-header-img">
                                <img src="assets/image/logo.png" alt="picture" />
                            </div>

                            <div class="profile-header-info">
                                <h4 class="m-t-sm">Robith Yusuf Al Fahsa</h4>
                                <p class="m-b-sm">Sistem Informasi Pemasaran</p>
                                <a href="#" class="btn btn-xs btn-primary mb-3">Edit Profile</a>
                            </div>
                        </div>

                        <ul class="profile-header-tab nav nav-tabs">
                            <li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>
                            <li class="nav-item"><a href="#profile-about" class="nav-link active show" data-toggle="tab">ABOUT</a></li>
                            <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
                            <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
                            <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li>
                        </ul>
                    </div>

                    <div class="profile-container">
                        <div class="row row-space-20">
                            <div class="col-md-8">
                                <div class="tab-content p-0">
                                    <div class="tab-pane active show" id="profile-about">
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">WORK AND EDUCATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Work</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b>Event Organizer Esport</b>
                                                            <span class="text-muted">Regional Kudus</span>
                                                        </div>
                                                        <div>
                                                            <b>Mahasiswa UTY (5190311127)</b>
                                                            <span class="text-muted">Sistem Informasi</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Education</td>
                                                    <td class="value">
                                                        <div class="m-b-5">
                                                            <b>University Teknologi Yogyakarta (2019)</b>
                                                            <span class="text-muted">Final Semester (Sistem Informasi)</span>
                                                        </div>
                                                        <div>
                                                            <b>Ma'had AlZaytun</b><br />
                                                            <span class="text-muted">2013-2019 (IPA)</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Skills</td>
                                                    <td class="value">
                                                        PHP, HTML5, CSS, jQuery, MYSQL, Bootstrap, JS
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">CONTACT INFORMATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Mobile Phones</td>
                                                    <td class="value">
                                                        +62 83126904714
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Email</td>
                                                    <td class="value">
                                                        Robithyusufalfahsa@gmail.com
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Facebook</td>
                                                    <td class="value">
                                                        http://facebook.com/robith_ya
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td class="field">Address</td>
                                                    <td class="value">
                                                       Kudus, Jawa Tengah<br />
                                                        Jln Cut Nyak Dien
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-profile">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">BASIC INFORMATION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="field">Birth of Date</td>
                                                    <td class="value">
                                                        Februari, 12 2001
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Gender</td>
                                                    <td class="value">
                                                        Male
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="field">Facebook</td>
                                                    <td class="value">
                                                        http://facebook.com/robith_ya
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 hidden-xs hidden-sm">
                                <ul class="profile-info-list">
                                    <li class="title">PERSONAL INFORMATION</li>
                                    <li>
                                        <div class="field">Occupation:</div>
                                        <div class="value">UX UI / Frontend Developer</div>
                                    </li>
                                    <li>
                                        <div class="field">Skills:</div>
                                        <div class="value">PHP, HTML5, CSS, jQuery, MYSQL, Bootstrap, JS </div>
                                    </li>
                                    <li>
                                        <div class="field">Birth of Date:</div>
                                        <div class="value">1995/11/25</div>
                                    </li>
                                    <li>
                                        <div class="field">Country:</div>
                                        <div class="value">Cambodia</div>
                                    </li>
                                    <li>
                                        <div class="field">Address:</div>
                                        <div class="value">
                                            <address class="m-b-0">
                                                Event Organizer, Inc.<br />
                                               Kudus, Jawa Tengah<br />
                                                Kota Kudus
                                            </address>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="field">Phone No.:</div>
                                        <div class="value">
                                            (+62) 83126904714
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- foodter -->
            
            <!-- end foodter -->
        </div>
        
    </div>
    <!-- <script> js php import</script> -->
    <?php include_once 'script/js.php';?>
    <!-- <script>Library</script> -->
    <!-- <script> import</script> -->
	</body>
</html>