

<div class="main-content">
    <section class="section">
        <h1 class="section-header">
            <div>Dashboard</div>
        </h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-pricetags"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Hospitals</h4>
                        </div>
                        <div class="card-body">
                           <?php  echo isset($total_hospitals['hospitals'])?$total_hospitals['hospitals']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-danger">
                        <i class="ion ion-ios-albums-outline"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Beds</h4>
                        </div>
                        <div class="card-body">
                            <?php  echo isset($total_beds['bed'])?$total_beds['bed']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-6 ">
                <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                        <i class="ion ion-folder"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Advance amount </h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo isset($advance_amount['advance'])?$advance_amount['advance']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
			 <div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-warning">
                        <i class="ion ion-ios-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Expenditures Amount </h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo isset($expenditure_amount['expenditure'])?$expenditure_amount['expenditure']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-dark">
                        <i class="ion ion-home"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Discount Amount </h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo isset($discount_amount['amount'])?$discount_amount['amount']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-secondary">
                        <i class="ion ion-ios-bookmarks"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash On Hand  </h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_on_hand['cash'])?$cash_on_hand['cash']:'0')-(isset($cash_on_hand_expenditure['cash'])?$cash_on_hand_expenditure['cash']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			
			
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash At Bank  </h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_at_bank['online'])?$cash_at_bank['online']:'0')-(isset($cash_at_bank_expenditure['online'])?$cash_at_bank_expenditure['online']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			
			
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-info">
                        <i class="ion-ios-browsers"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Amount</h4>
                        </div>
                        <div class="card-body">
                            ₹   <?php  echo isset($total_amount['total'])?$total_amount['total']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
			 <div class="col-md-6 ">
                <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                        <i class="ion ion-ios-copy"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Received Amount </h4>
                        </div>
                        <div class="card-body">
                            ₹  <?php  echo isset($received_amount['paid'])?$received_amount['paid']:'0'?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-secondary">
                        <i class="ion ion-ios-flask"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pending Amount</h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo ((isset($total_amount['total'])?$total_amount['total']:'0')-((isset($received_amount['paid'])?$received_amount['paid']:'0')+(isset($discount_amount['amount'])?$discount_amount['amount']:'0')))?>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-secondary">
                        <i class="ion ion-ios-bookmarks"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash On Hand Hyderabad District</h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_on_hand_kadapa_dist['cash'])?$cash_on_hand_kadapa_dist['cash']:'0')-(isset($cash_on_hand_expenditure_kadapa_dist['cash'])?$cash_on_hand_expenditure_kadapa_dist['cash']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-secondary">
                        <i class="ion ion-ios-bookmarks"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash On Hand Nalgonda District</h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_on_hand_Ananthapur_dist['cash'])?$cash_on_hand_Ananthapur_dist['cash']:'0')-(isset($cash_on_hand_expenditure_Ananthapur_dist['cash'])?$cash_on_hand_expenditure_Ananthapur_dist['cash']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash At Bank Hyderabad District</h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_at_bank_kadapa_dist['online'])?$cash_at_bank_kadapa_dist['online']:'0')-(isset($cash_at_bank_expenditure_kadapa_dist['online'])?$cash_at_bank_expenditure_kadapa_dist['online']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Cash At Bank Nalgonda District</h4>
                        </div>
                        <div class="card-body">
                            ₹ <?php  echo (isset($cash_at_bank_Ananthapur_dist['online'])?$cash_at_bank_Ananthapur_dist['online']:'0')-(isset($cash_at_bank_expenditure_Ananthapur_dist['online'])?$cash_at_bank_expenditure_Ananthapur_dist['online']:'0')?>
                        </div>
                    </div>
                </div>
            </div>
			
			
           
        </div>
        
    </section>
</div>

