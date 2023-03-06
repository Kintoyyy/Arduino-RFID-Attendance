<!DOCTYPE html>
<html>
<?php include "public/partials/html_headers.php"; ?>
<?php include "public/partials/html_navbar_top.php"; ?>


<link href="/assets/css/bulma-calendar.min.css" rel="stylesheet">
    <script src="/assets/js/bulma-calendar.min.js"></script>
<body>
    <?php include "public/partials/html_hero_header.php"; ?>
    <!-- <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div id="form" class="card-content">
                            <p class="title">
                                Add Students
                            </p>
                            <div id="organizerContainer"></div>
                        </div>
                    </div>
                </div>
                <div class="column is-8-desktop">
                    <div class="card">
                        <div class="card-content">
                            <p class="title">
                                Students
                            </p>
                            <div id="calendarContainer"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="datetimepicker-container"><div class="datetimepicker-header">
        <div class="datetimepicker-selection-details">
            <div class="datetimepicker-selection-from is-hidden"></div>
            <div class="datetimepicker-selection-start">
                <div class="datetimepicker-selection-wrapper">
                    <div class="datetimepicker-selection-day">14</div>
                    <div class="datetimepicker-selection-date">
                        <div class="datetimepicker-selection-month">March 2023</div>
                        <div class="datetimepicker-selection-weekday">Tuesday</div>
                    </div>
                </div>
                <div class="datetimepicker-selection-time">
                    <div class="datetimepicker-selection-time-icon">
                        <figure class="image is-16x16">
                            <svg version="1.1" x="0px" y="0px" viewBox="0 0 60 60" xml:space="preserve">
      <g>
        <path fill="currentcolor" d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"></path>
          <path fill="currentcolor" d="M30,6c-0.552,0-1,0.447-1,1v23H14c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1V7C31,6.447,30.552,6,30,6z"></path>
      </g>
    </svg>
                        </figure>
                    </div>
                    <div class="datetimepicker-selection-hour">00:00</div>
                </div>
            </div>
        </div>
        
        <div class="datetimepicker-selection-details">
            <div class="datetimepicker-selection-to  is-hidden"></div>
            <div class="datetimepicker-selection-end">
                <div class="datetimepicker-selection-wrapper">
                    <div class="datetimepicker-selection-day">29</div>
                    <div class="datetimepicker-selection-date">
                        <div class="datetimepicker-selection-month">March 2023</div>
                        <div class="datetimepicker-selection-weekday">Wednesday</div>
                    </div>
                </div>
                <div class="datetimepicker-selection-time">
                    <div class="datetimepicker-selection-time-icon">
                        <figure class="image is-16x16">
                            <svg version="1.1" x="0px" y="0px" viewBox="0 0 60 60" xml:space="preserve">
      <g>
        <path fill="currentcolor" d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"></path>
          <path fill="currentcolor" d="M30,6c-0.552,0-1,0.447-1,1v23H14c-0.552,0-1,0.447-1,1s0.448,1,1,1h16c0.552,0,1-0.447,1-1V7C31,6.447,30.552,6,30,6z"></path>
      </g>
    </svg>
                        </figure>
                    </div>
                    <div class="datetimepicker-selection-hour">23:59</div>
                </div>
            </div>
        </div>
    </div><div class="datepicker">
    <div class="datepicker-nav">
        <button type="button" class="datepicker-nav-previous button is-small is-text"><svg viewBox="0 0 50 80" xml:space="preserve">
      <polyline fill="none" stroke-width=".5em" stroke-linecap="round" stroke-linejoin="round" points="45.63,75.8 0.375,38.087 45.63,0.375 "></polyline>
    </svg></button>
        <div class="datepicker-nav-month-year">
          <div class="datepicker-nav-month">March</div>
          &nbsp;
          <div class="datepicker-nav-year">2023</div>
        </div>
        <button type="button" class="datepicker-nav-next button is-small is-text"><svg viewBox="0 0 50 80" xml:space="preserve">
      <polyline fill="none" stroke-width=".5em" stroke-linecap="round" stroke-linejoin="round" points="0.375,0.375 45.63,38.087 0.375,75.8 "></polyline>
    </svg></button>
      </div>
      <div class="datepicker-body">
        <div class="datepicker-dates is-active"><div class="datepicker-weekdays">
        <div class="datepicker-date">
            Sun
        </div><div class="datepicker-date">
            Mon
        </div><div class="datepicker-date">
            Tue
        </div><div class="datepicker-date">
            Wed
        </div><div class="datepicker-date">
            Thu
        </div><div class="datepicker-date">
            Fri
        </div><div class="datepicker-date">
            Sat
        </div>
    </div><div class="datepicker-days"><div data-date="Sun Feb 26 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date">
      <button class="date-item" type="button">26</button>
  </div><div data-date="Mon Feb 27 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date">
      <button class="date-item" type="button">27</button>
  </div><div data-date="Tue Feb 28 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date">
      <button class="date-item" type="button">28</button>
  </div><div data-date="Wed Mar 01 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">1</button>
  </div><div data-date="Thu Mar 02 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">2</button>
  </div><div data-date="Fri Mar 03 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">3</button>
  </div><div data-date="Sat Mar 04 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">4</button>
  </div><div data-date="Sun Mar 05 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">5</button>
  </div><div data-date="Mon Mar 06 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item is-today" type="button">6</button>
  </div><div data-date="Tue Mar 07 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">7</button>
  </div><div data-date="Wed Mar 08 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">8</button>
  </div><div data-date="Thu Mar 09 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">9</button>
  </div><div data-date="Fri Mar 10 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">10</button>
  </div><div data-date="Sat Mar 11 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">11</button>
  </div><div data-date="Sun Mar 12 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">12</button>
  </div><div data-date="Mon Mar 13 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">13</button>
  </div><div data-date="Tue Mar 14 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range datepicker-range-start">
      <button class="date-item is-active" type="button">14</button>
  </div><div data-date="Wed Mar 15 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">15</button>
  </div><div data-date="Thu Mar 16 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">16</button>
  </div><div data-date="Fri Mar 17 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">17</button>
  </div><div data-date="Sat Mar 18 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">18</button>
  </div><div data-date="Sun Mar 19 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">19</button>
  </div><div data-date="Mon Mar 20 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">20</button>
  </div><div data-date="Tue Mar 21 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">21</button>
  </div><div data-date="Wed Mar 22 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">22</button>
  </div><div data-date="Thu Mar 23 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">23</button>
  </div><div data-date="Fri Mar 24 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">24</button>
  </div><div data-date="Sat Mar 25 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">25</button>
  </div><div data-date="Sun Mar 26 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">26</button>
  </div><div data-date="Mon Mar 27 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">27</button>
  </div><div data-date="Tue Mar 28 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range">
      <button class="date-item" type="button">28</button>
  </div><div data-date="Wed Mar 29 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month datepicker-range datepicker-range-end">
      <button class="date-item" type="button">29</button>
  </div><div data-date="Thu Mar 30 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">30</button>
  </div><div data-date="Fri Mar 31 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date is-current-month">
      <button class="date-item" type="button">31</button>
  </div><div data-date="Sat Apr 01 2023 00:00:00 GMT+0800 (Taipei Standard Time)" class="datepicker-date">
      <button class="date-item" type="button">1</button>
  </div></div></div>
        <div class="datepicker-months">
        <div class="datepicker-month" data-month="01">
            Jan
        </div>
    
        <div class="datepicker-month" data-month="02">
            Feb
        </div>
    
        <div class="datepicker-month is-active" data-month="03">
            Mar
        </div>
    
        <div class="datepicker-month" data-month="04">
            Apr
        </div>
    
        <div class="datepicker-month" data-month="05">
            May
        </div>
    
        <div class="datepicker-month" data-month="06">
            Jun
        </div>
    
        <div class="datepicker-month" data-month="07">
            Jul
        </div>
    
        <div class="datepicker-month" data-month="08">
            Aug
        </div>
    
        <div class="datepicker-month" data-month="09">
            Sep
        </div>
    
        <div class="datepicker-month" data-month="10">
            Oct
        </div>
    
        <div class="datepicker-month" data-month="11">
            Nov
        </div>
    
        <div class="datepicker-month" data-month="12">
            Dec
        </div>
    </div>
        <div class="datepicker-years">
        <div class="datepicker-year" data-year="1973">
            <span class="item">1973</span>
        </div>
    
        <div class="datepicker-year" data-year="1974">
            <span class="item">1974</span>
        </div>
    
        <div class="datepicker-year" data-year="1975">
            <span class="item">1975</span>
        </div>
    
        <div class="datepicker-year" data-year="1976">
            <span class="item">1976</span>
        </div>
    
        <div class="datepicker-year" data-year="1977">
            <span class="item">1977</span>
        </div>
    
        <div class="datepicker-year" data-year="1978">
            <span class="item">1978</span>
        </div>
    
        <div class="datepicker-year" data-year="1979">
            <span class="item">1979</span>
        </div>
    
        <div class="datepicker-year" data-year="1980">
            <span class="item">1980</span>
        </div>
    
        <div class="datepicker-year" data-year="1981">
            <span class="item">1981</span>
        </div>
    
        <div class="datepicker-year" data-year="1982">
            <span class="item">1982</span>
        </div>
    
        <div class="datepicker-year" data-year="1983">
            <span class="item">1983</span>
        </div>
    
        <div class="datepicker-year" data-year="1984">
            <span class="item">1984</span>
        </div>
    
        <div class="datepicker-year" data-year="1985">
            <span class="item">1985</span>
        </div>
    
        <div class="datepicker-year" data-year="1986">
            <span class="item">1986</span>
        </div>
    
        <div class="datepicker-year" data-year="1987">
            <span class="item">1987</span>
        </div>
    
        <div class="datepicker-year" data-year="1988">
            <span class="item">1988</span>
        </div>
    
        <div class="datepicker-year" data-year="1989">
            <span class="item">1989</span>
        </div>
    
        <div class="datepicker-year" data-year="1990">
            <span class="item">1990</span>
        </div>
    
        <div class="datepicker-year" data-year="1991">
            <span class="item">1991</span>
        </div>
    
        <div class="datepicker-year" data-year="1992">
            <span class="item">1992</span>
        </div>
    
        <div class="datepicker-year" data-year="1993">
            <span class="item">1993</span>
        </div>
    
        <div class="datepicker-year" data-year="1994">
            <span class="item">1994</span>
        </div>
    
        <div class="datepicker-year" data-year="1995">
            <span class="item">1995</span>
        </div>
    
        <div class="datepicker-year" data-year="1996">
            <span class="item">1996</span>
        </div>
    
        <div class="datepicker-year" data-year="1997">
            <span class="item">1997</span>
        </div>
    
        <div class="datepicker-year" data-year="1998">
            <span class="item">1998</span>
        </div>
    
        <div class="datepicker-year" data-year="1999">
            <span class="item">1999</span>
        </div>
    
        <div class="datepicker-year" data-year="2000">
            <span class="item">2000</span>
        </div>
    
        <div class="datepicker-year" data-year="2001">
            <span class="item">2001</span>
        </div>
    
        <div class="datepicker-year" data-year="2002">
            <span class="item">2002</span>
        </div>
    
        <div class="datepicker-year" data-year="2003">
            <span class="item">2003</span>
        </div>
    
        <div class="datepicker-year" data-year="2004">
            <span class="item">2004</span>
        </div>
    
        <div class="datepicker-year" data-year="2005">
            <span class="item">2005</span>
        </div>
    
        <div class="datepicker-year" data-year="2006">
            <span class="item">2006</span>
        </div>
    
        <div class="datepicker-year" data-year="2007">
            <span class="item">2007</span>
        </div>
    
        <div class="datepicker-year" data-year="2008">
            <span class="item">2008</span>
        </div>
    
        <div class="datepicker-year" data-year="2009">
            <span class="item">2009</span>
        </div>
    
        <div class="datepicker-year" data-year="2010">
            <span class="item">2010</span>
        </div>
    
        <div class="datepicker-year" data-year="2011">
            <span class="item">2011</span>
        </div>
    
        <div class="datepicker-year" data-year="2012">
            <span class="item">2012</span>
        </div>
    
        <div class="datepicker-year" data-year="2013">
            <span class="item">2013</span>
        </div>
    
        <div class="datepicker-year" data-year="2014">
            <span class="item">2014</span>
        </div>
    
        <div class="datepicker-year" data-year="2015">
            <span class="item">2015</span>
        </div>
    
        <div class="datepicker-year" data-year="2016">
            <span class="item">2016</span>
        </div>
    
        <div class="datepicker-year" data-year="2017">
            <span class="item">2017</span>
        </div>
    
        <div class="datepicker-year" data-year="2018">
            <span class="item">2018</span>
        </div>
    
        <div class="datepicker-year" data-year="2019">
            <span class="item">2019</span>
        </div>
    
        <div class="datepicker-year" data-year="2020">
            <span class="item">2020</span>
        </div>
    
        <div class="datepicker-year" data-year="2021">
            <span class="item">2021</span>
        </div>
    
        <div class="datepicker-year" data-year="2022">
            <span class="item">2022</span>
        </div>
    
        <div class="datepicker-year is-active" data-year="2023">
            <span class="item">2023</span>
        </div>
    
        <div class="datepicker-year" data-year="2024">
            <span class="item">2024</span>
        </div>
    
        <div class="datepicker-year" data-year="2025">
            <span class="item">2025</span>
        </div>
    
        <div class="datepicker-year" data-year="2026">
            <span class="item">2026</span>
        </div>
    
        <div class="datepicker-year" data-year="2027">
            <span class="item">2027</span>
        </div>
    
        <div class="datepicker-year" data-year="2028">
            <span class="item">2028</span>
        </div>
    
        <div class="datepicker-year" data-year="2029">
            <span class="item">2029</span>
        </div>
    
        <div class="datepicker-year" data-year="2030">
            <span class="item">2030</span>
        </div>
    
        <div class="datepicker-year" data-year="2031">
            <span class="item">2031</span>
        </div>
    
        <div class="datepicker-year" data-year="2032">
            <span class="item">2032</span>
        </div>
    
        <div class="datepicker-year" data-year="2033">
            <span class="item">2033</span>
        </div>
    
        <div class="datepicker-year" data-year="2034">
            <span class="item">2034</span>
        </div>
    
        <div class="datepicker-year" data-year="2035">
            <span class="item">2035</span>
        </div>
    
        <div class="datepicker-year" data-year="2036">
            <span class="item">2036</span>
        </div>
    
        <div class="datepicker-year" data-year="2037">
            <span class="item">2037</span>
        </div>
    
        <div class="datepicker-year" data-year="2038">
            <span class="item">2038</span>
        </div>
    
        <div class="datepicker-year" data-year="2039">
            <span class="item">2039</span>
        </div>
    
        <div class="datepicker-year" data-year="2040">
            <span class="item">2040</span>
        </div>
    
        <div class="datepicker-year" data-year="2041">
            <span class="item">2041</span>
        </div>
    
        <div class="datepicker-year" data-year="2042">
            <span class="item">2042</span>
        </div>
    
        <div class="datepicker-year" data-year="2043">
            <span class="item">2043</span>
        </div>
    
        <div class="datepicker-year" data-year="2044">
            <span class="item">2044</span>
        </div>
    
        <div class="datepicker-year" data-year="2045">
            <span class="item">2045</span>
        </div>
    
        <div class="datepicker-year" data-year="2046">
            <span class="item">2046</span>
        </div>
    
        <div class="datepicker-year" data-year="2047">
            <span class="item">2047</span>
        </div>
    
        <div class="datepicker-year" data-year="2048">
            <span class="item">2048</span>
        </div>
    
        <div class="datepicker-year" data-year="2049">
            <span class="item">2049</span>
        </div>
    
        <div class="datepicker-year" data-year="2050">
            <span class="item">2050</span>
        </div>
    
        <div class="datepicker-year" data-year="2051">
            <span class="item">2051</span>
        </div>
    
        <div class="datepicker-year" data-year="2052">
            <span class="item">2052</span>
        </div>
    
        <div class="datepicker-year" data-year="2053">
            <span class="item">2053</span>
        </div>
    
        <div class="datepicker-year" data-year="2054">
            <span class="item">2054</span>
        </div>
    
        <div class="datepicker-year" data-year="2055">
            <span class="item">2055</span>
        </div>
    
        <div class="datepicker-year" data-year="2056">
            <span class="item">2056</span>
        </div>
    
        <div class="datepicker-year" data-year="2057">
            <span class="item">2057</span>
        </div>
    
        <div class="datepicker-year" data-year="2058">
            <span class="item">2058</span>
        </div>
    
        <div class="datepicker-year" data-year="2059">
            <span class="item">2059</span>
        </div>
    
        <div class="datepicker-year" data-year="2060">
            <span class="item">2060</span>
        </div>
    
        <div class="datepicker-year" data-year="2061">
            <span class="item">2061</span>
        </div>
    
        <div class="datepicker-year" data-year="2062">
            <span class="item">2062</span>
        </div>
    
        <div class="datepicker-year" data-year="2063">
            <span class="item">2063</span>
        </div>
    
        <div class="datepicker-year" data-year="2064">
            <span class="item">2064</span>
        </div>
    
        <div class="datepicker-year" data-year="2065">
            <span class="item">2065</span>
        </div>
    
        <div class="datepicker-year" data-year="2066">
            <span class="item">2066</span>
        </div>
    
        <div class="datepicker-year" data-year="2067">
            <span class="item">2067</span>
        </div>
    
        <div class="datepicker-year" data-year="2068">
            <span class="item">2068</span>
        </div>
    
        <div class="datepicker-year" data-year="2069">
            <span class="item">2069</span>
        </div>
    
        <div class="datepicker-year" data-year="2070">
            <span class="item">2070</span>
        </div>
    
        <div class="datepicker-year" data-year="2071">
            <span class="item">2071</span>
        </div>
    
        <div class="datepicker-year" data-year="2072">
            <span class="item">2072</span>
        </div>
    </div>
      </div>
    </div><div class="timepicker">
    <div class="timepicker-start">
      <div class="timepicker-hours">
        <span class="timepicker-next">+</span>
        <div class="timepicker-input">
          <input type="number">
          <div class="timepicker-input-number">00</div>
        </div>
        <span class="timepicker-previous">-</span>
      </div>
      <div class="timepicker-time-divider">:</div>
      <div class="timepicker-minutes">
        <span class="timepicker-next">+</span>
        <div class="timepicker-input">
          <input type="number">
          <div class="timepicker-input-number">00</div>
        </div>
        <span class="timepicker-previous">-</span>
      </div>
    </div>
    <div class="timepicker-end">
      <div class="timepicker-hours">
        <span class="timepicker-next">+</span>
        <div class="timepicker-input">
          <input type="number">
          <div class="timepicker-input-number">23</div>
        </div>
        <span class="timepicker-previous">-</span>
      </div>
      <div class="timepicker-time-divider">:</div>
      <div class="timepicker-minutes">
        <span class="timepicker-next">+</span>
        <div class="timepicker-input">
          <input type="number">
          <div class="timepicker-input-number">59</div>
        </div>
        <span class="timepicker-previous">-</span>
      </div>
    </div>
  </div></div>

    <script>
        // Initialize all input of type date
        var calendars = bulmaCalendar.attach('[type="date"]', options);

        // Loop on each calendar initialized
        for (var i = 0; i < calendars.length; i++) {
            // Add listener to select event
            calendars[i].on('select', date => {
                console.log(date);
            });
        }

        // To access to bulmaCalendar instance of an element
        var element = document.querySelector('#my-element');
        if (element) {
            // bulmaCalendar instance is available as element.bulmaCalendar
            element.bulmaCalendar.on('select', function (datepicker) {
                console.log(datepicker.data.value());
            });
        }
    </script>
    <link href="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css"
        rel="stylesheet" />
    <script src="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js"></script>
    <script>
        // // Basic config
        // var calendar = new Calendar("calendarContainer", "medium",
        //     ["Monday", 3],
        //     ["hsl(171, 100%, 41%)", "hsl(171, 100%, 29%)", "hsl(0, 0%, 100%)", "hsl(142, 52%, 96%)"],
        //     {
        //         days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        //         months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        //         indicator: false,
        //         placeholder: "<span>Custom Placeholder</span>"
        //     });

        // var data = {
        //     2023: {
        //         3: {
        //             5: [
        //                 {
        //                     startTime: "00:00",
        //                     endTime: "24:00",
        //                     text: "Christmas Day"
        //                 }
        //             ]
        //         }
        //     }
        // };

        // var organizer = new Organizer("organizerContainer", calendar, data);
    </script>
</body>
<?php include "public/partials/html_footer.php"; ?>

</html>