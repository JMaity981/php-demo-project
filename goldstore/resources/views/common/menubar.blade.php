<ul class="metismenu" id="menu">
    <!--<li id="mnu_dashboard">
        <a href="{{url('dashboard')}}">
            <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>-->
	<li id = "mnu_lager">
        <a href="{{url('lager')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-user-check"></i>
            </div>
            <div class="menu-title">Ledger</div>
        </a>
    </li>
	<li id = "mnu_recived">
        <a href="{{url('recived')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-cart-alt"></i>
            </div>
            <div class="menu-title">Received</div>
        </a>
    </li>
	<!--<li id = "mnu_salepurchase">
        <a href="{{url('sale-purchase')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-user-check"></i>
            </div>
            <div class="menu-title">Sale Purchase</div>
        </a>
    </li>
	<li id = "mnu_fund_credit_debit">
        <a href="{{url('fund-credit-debit')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-user-check"></i>
            </div>
            <div class="menu-title">Fund Credit & Debit</div>
        </a>
    </li>-->
    <li id = "mnu_transection">
        <a href="{{url('transection')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-transfer"></i>
            </div>
            <div class="menu-title">Transaction</div>
        </a>
    </li>
	<li id = "mnu_booking">
        <a href="{{url('booking')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-book-add"></i>
            </div>
            <div class="menu-title">Booking</div>
        </a>
    </li>
	<li id = "mnu_opening_balance">
        <a href="{{url('opening-balance')}}">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-money"></i>
            </div>
            <div class="menu-title">Opening Balance</div>
        </a>
    </li>
    <li id = "mnu_satement">
        <a href="javascript:;">
            <div class="parent-icon icon-color-2">
				<i class="fadeIn animated bx bx-book-reader"></i>
            </div>
            <div class="menu-title">Statement</div>
        </a>
		<ul>
			<li id="mnu_deu_deposite_statement"> 
				<a href="{{url('party-deu-deposit')}}">
					<i class="bx bx-right-arrow-alt"></i>Party Due and Deposit Statement
				</a>
			</li>
			<li id="mnu_touch_statement"> 
				<a href="{{url('touch-statment')}}">
					<i class="bx bx-right-arrow-alt"></i>Tounch Statement
				</a>
			</li>
			<li id ="mnu_refine_statement"> 
				<a href="{{url('refine-statment')}}">
					<i class="bx bx-right-arrow-alt"></i>Refine Statement
				</a>
			</li>
			<li id ="mnu_our_sale_parchase"> 
				<a href="{{url('our-sale-and-parchase')}}">
					<i class="bx bx-right-arrow-alt"></i>Sale and Purchase
				</a>
			</li>
			{{-- <li id="mnu_party_sale_parchase"> 
				<a href="{{url('party-sale-and-parchase')}}">
					<i class="bx bx-right-arrow-alt"></i>Sale and Purchase(Party)
				</a>
			</li> --}}
			<li id="mnu_debit_credit_statement"> 
				<a href="{{url('debit-credit-statment')}}">
					<i class="bx bx-right-arrow-alt"></i>Debit/Credit Statement
				</a>
			</li>
			<li id="mnu_party_deu_deposite_statement"> 
				<a href="all-deu-deposite-Statment">
					<i class="bx bx-right-arrow-alt"></i>All Party Due/Deposit Statement
				</a>
			</li>
		</ul>
    </li>
</ul>