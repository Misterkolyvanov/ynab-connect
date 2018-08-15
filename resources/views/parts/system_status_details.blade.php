<div class="col-sm-12">
    <h4 class="info-text"> Connection Status

        <span class="float-right">Payout: $@if($user->habitica_payout_amt){{ number_format($user->habitica_payout_amt / 1000) }}@else0.00@endif</span>
    </h4>
</div>

<div class="col-sm-12">
    <div class="col-sm-4">
        <div class="choice @if(!empty($ynab_user) && !empty($ynab_user->user) && $ynab_user->user->id) active @endif" data-toggle="wizard-checkbox">
            <input type="checkbox" value="Code" checked="checked">
            <div class="icon">
                <i class="fa @if(!empty($ynab_user)  && !empty($ynab_user->user) && $ynab_user->user->id) fa-check @else fa-times @endif"></i>
            </div>
            <h6>YNAB {{--({{ $ynab_user->user->id }})--}}</h6>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="choice @if(!empty($habitica_user) && $habitica_user->profile->name) active @endif" data-toggle="wizard-checkbox">
            <input type="checkbox" value="Code" checked="checked">
            <div class="icon">
                <i class="fa @if(!empty($habitica_user) && $habitica_user->profile->name) fa-check @else fa-times @endif"></i>
            </div>
            <h6>Habitica {{ $habitica_user->profile->name or '' }} {{-- ({{ $habitica_user->stats->lvl }}) Gold:{{ $habitica_user->stats->gp }} --}}</h6>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="choice @if(!empty($configuration) && $configuration->habitica_reward_amt) active @endif" data-toggle="wizard-checkbox">
            <input type="checkbox" value="Code" checked="checked">
            <div class="icon">
                <i class="fa @if(!empty($configuration) && $configuration->habitica_reward_amt) fa-check @else fa-times @endif"></i>
            </div>
            <h6>Run</h6>
        </div>
    </div>
</div>

<div class="col-sm-12" style="text-align: center; margin-top:20px">
    @if(!empty($ynab_user) && !empty($ynab_user->user) && !empty($habitica_user) && $habitica_user->profile->name)
        <button type="button" class="btn btn-primary">Manually Run Program</button>
    @endif
    <p class="alert alert-info">
        Typically the program will run every 10 minutes and post transactions to your YNAB account & category selected.
    Additionally,  your "Budgeted" amount will be balanced nightly, meaning you'r a negative transaction will offset your
    set budget. This process is called "balancing", the Balancer negatively offsets your budget, so that you can earn it
    back completing tasks in Habitica. Learn more here: <a href="/how-it-works">How it works ></a> </p>
</div>
