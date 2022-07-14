<link rel="stylesheet" media="screen" href="css_extra/style.css" />
<link rel="stylesheet" media="screen" href="css_extra/forms.css" />
<link rel="stylesheet" media="screen" href="css_extra/tables.css" />
<link rel="stylesheet" media="screen" href="css_extra/visualize.css" />

<script src="js_extra/html5.js"></script>
<!-- jquerytools -->
<script src="js_extra/jquery.tools.min.js"></script>
<script src="js_extra/visualize.jQuery.js"></script>
<!--[if lte IE 9]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<script type="text/javascript" src="js/ie.js"></script>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" media="screen" href="css/ie8.css" />
<![endif]-->

<script type="text/javascript" src="js_extra/global.js"></script>
<br /><br />
<table class="full visualize line">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th scope="col">Jan</th>
                                        <th scope="col">Feb</th>
                                        <th scope="col">Mar</th>
                                        <th scope="col">Apr</th>
                                        <th scope="col">May</th>
                                        <th scope="col">Jun</th>
                                        <th scope="col">Jul</th>
                                        <th scope="col">Aug</th>
                                        <th scope="col">Sep</th>
                                        <th scope="col">Oct</th>
                                        <th scope="col">Nov</th>
                                        <th scope="col">Dec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Completed Orders</th>
                                        <td>20</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td>25</td>
                                        <td>28</td>
                                        <td>25</td>
                                        <td>24</td>
                                        <td>26</td>
                                        <td>27</td>
                                        <td>29</td>
                                        <td>30</td>
                                        <td>20</td>
                                    </tr>
                                </tbody>
                            </table>

<script>
$(document).ready(function(){
    $('table.visualize').visualize({type: 'line', width: '340px', height: '150px'}).css({marginLeft: '20px'});
    $('table.visualize').hide();
});
</script>
