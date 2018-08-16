@extends('layouts.main')


@section('wizard')

    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="green" id="wizard">
            <form action="/user/configuration" method="post" id="save_user_configuration">
                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                @csrf
                <div class="wizard-header">
                    <h3 class="wizard-title">
                        Setup
                    </h3>
                    <h5>Get started by inputting your API details and configuring the {{ config('app.name', 'Laravel') }} utility. </h5>
                </div>
                <div class="wizard-navigation">
                    <ul>
                        <li><a href="#welcome" data-toggle="tab">Welcome</a></li>
                        <li><a href="#ynab_api" data-toggle="tab">YNAB API</a></li>
                        <li><a href="#habitica_api" data-toggle="tab">Habitica API</a></li>
                        <li><a href="#settings" data-toggle="tab" >Settings</a></li>
                        <li><a href="#run" data-toggle="tab">Tasks</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane" id="welcome">
                        <div class="row">
                            <div class="col-sm-12" id="system_status_details" style="text-align: center">
                                <progress max="100"></progress>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="ynab_api">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="info-text"> Let's start with the YNAB API details.
                                    <i class="material-icons" data-toggle="modal" data-target="#what-is-ynab">info</i></h4>
                            </div>

                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">YNAB Personal Access Token</label>
                                        <input name="ynab_token" id="ynab-pa-token" type="text" class="form-control" value="{{ $configuration->ynab_token or '' }}">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-default" id="ynab-pa-token-test-btn">
                                    <i class="material-icons">swap_horiz</i> Test Token
                                </button>
                                <p class="alert alert-warning" id="ynab-pa-test-result">Run a test to see if you can connect to YNAB</p>
                            </div>

                            <div class="col-sm-12">
                                <ol>
                                    <li>Login to your YNAB Account.</li>
                                    <li>Click on Username in lower left corner and click on “My Account”</li>
                                    <li>Click on “Developer Settings” and then on “New Tokens”.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="habitica_api">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="info-text"> Let's start with the Habitica API details.
                                    <i class="material-icons" data-toggle="modal" data-target="#what-is-habitica">info</i></h4>
                            </div>


                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Habitica User ID</label>
                                        <input name="habitica_user_id" id="habitica_user_id" type="text" class="form-control" value="{{ $configuration->habitica_user_id or '' }}">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Habitica Key</label>
                                        <input name="habitica_user_key" id="habitica_user_key" type="text" class="form-control" value="{{ $configuration->habitica_user_key or '' }}">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-default" id="habitica-access-test-btn">
                                    <i class="material-icons">swap_horiz</i> Test API Access
                                </button>
                            </div>


                            <div class="col-sm-6">
                                <ol>
                                    <li> Login to your Habitica Account.</li>
                                    <li> Go to Settings, then API, and click on “Show API Token”</li>
                                    <li> Now copy over the User ID # and the API Token # (both look like long strings of numbers and letters)</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="alert alert-warning" id="habitica-access-test-result">Run a test to see if you can connect to Habitica</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="info-text"> Select Your Active YNAB Budget, Account, and Category
                                    </h4>
                            </div>

                            <div class="col-sm-6" id="setting_content" style="text-align: center">
                                <progress max="100"></progress>
                            </div>

                            <div class="col-sm-6">
                                <ol>
                                    <li>Select your Budget in YNAB</li>
                                    <li>Add an account or select an existing one</li>
                                    <li>Select a category that {{ config('app.name', 'Laravel') }} will pull from</li>
                                </ol>

                                <p class="alert alert-info">
                                    Next up, we recommend that you create a new “bank” account in YNAB called “YNABitica” so that the transactions made by us don’t get confused with your actual bank totals.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="run">
                        <div class="row">
                            <h4 class="info-text"> Set how much you want to earn back</h4>

                            <div class="col-sm-12" id="rw-selector-container">
                                <div class="col-sm-4">
                                    <div class="choice @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .10) active @endif" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="10 cents per hard task completed rewarded">
                                        <input type="radio" class="rw-selector" name="habitica_reward_amt" value=".10" @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .10) checked="checked" @endif>
                                        <div class="icon">
                                            <i class="material-icons">attach_money</i>
                                        </div>
                                        <h6>Dime</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="choice @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .25) active @endif" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="25 cents per hard task completed rewarded">
                                        <input type="radio" class="rw-selector" name="habitica_reward_amt" value=".25" @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .25) checked="checked" @endif>
                                        <div class="icon">
                                            <i class="material-icons">attach_money</i>
                                        </div>
                                        <h6>Quarter</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="choice @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .50) active @endif" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="50 cents per hard task completed rewarded">
                                        <input type="radio" class="rw-selector" name="habitica_reward_amt" value=".50" @if(isset($configuration->habitica_reward_amt) && $configuration->habitica_reward_amt == .50) checked="checked" @endif>
                                        <div class="icon">
                                            <i class="material-icons">attach_money</i>
                                        </div>
                                        <h6>Half Dollar</h6>
                                    </div>
                                </div>
                            </div>


                             <br />


                            <div class="col-sm-12">
                                <p class="alert alert-info">
                                    Rewards exceeding the budget max in YNAB will be truncated, selecting the right amount for
                                    task rewards is crucial in the satisfaction of this utility.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wizard-footer">
                    <div class="pull-right">
                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish & Run' />
                    </div>
                    <div class="pull-left">
                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                        <div class="footer-checkbox">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="subscribe_news_letter" @if(isset($configuration->subscribe_news_letter) && $configuration->subscribe_news_letter == 'on') checked="checked" @endif>
                                    </label>
                                    Subscribe to {{ config('app.name', 'Laravel') }} newsletter
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div> <!-- wizard container -->


    <!-- What is Habitica Modal -->
    <div class="modal fade" id="what-is-habitica" tabindex="-1" role="dialog" aria-labelledby="what-is-habitica" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="oneLabel">What is Habitica</h5>
                </div>
                <div class="modal-body">
                    <p>Habitica is a free habit and productivity app that treats your real life like a game.
                        Habitica can help you achieve your goals to become healthy and happy.</p>

                    <a href="https://habitica.com/" target="_blank">Sign up for Habitica, if you haven't already!</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- What is YNAB Modal -->
    <div class="modal fade" id="what-is-ynab" tabindex="-1" role="dialog" aria-labelledby="what-is-ynab" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="oneLabel">What is YNAB</h5>
                </div>
                <div class="modal-body">
                    <p>You Need a Budget (YNAB) is a multi-platform personal budgeting program
                        based on the envelope method.</p>

                    <a href="https://ynab.com/" target="_blank">Sign up for YNAB, if you haven't already!</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection