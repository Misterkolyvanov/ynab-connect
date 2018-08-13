<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">attach_money</i>
    </span>
    <div class="form-group label-floating">
        <label class="control-label">YNAB Budgets</label>
        <select class="form-control my-budget-selector" name="ynab_default_budget" @if(!empty($ynab_budgets) && !count($ynab_budgets->budgets)) disabled @endif>
            @if(!empty($ynab_budgets))
                @foreach($ynab_budgets->budgets as $budget)
                    <option value="{{ $budget->id }}"
                            @if(isset($configuration->ynab_default_budget) && $configuration->ynab_default_budget == $budget->id) SELECTED @endif
                    >{{ $budget->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">account_balance</i>
    </span>
    <div class="form-group label-floating">
        <label class="control-label">YNAB Accounts</label>
        <select class="form-control my-budget-selector" name="ynab_default_account" @if(!empty($ynab_accounts) && !count($ynab_accounts->accounts)) disabled @endif>
           @if(!empty($ynab_accounts))
                @foreach($ynab_accounts->accounts as $account)
                    <option value="{{ $account->id }}"
                            @if(isset($configuration->ynab_default_account) && $configuration->ynab_default_account == $account->id) SELECTED @endif
                    >{{ $account->name }} | {{ $account->type }} {{ \App\Http\Controllers\Helper::convert_money($account->balance) }}</option>
                @endforeach
           @endif
        </select>
    </div>
</div>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">folder</i>
    </span>
    <div class="form-group label-floating">
        <label class="control-label">YNAB Category</label>
        <select class="form-control my-budget-selector" name="ynab_default_category" @if(!empty($ynab_categories) &&  !count($ynab_categories)) disabled @endif>
            @if(!empty($ynab_categories))
                @foreach($ynab_categories->category_groups as $groups)
                    <optgroup label="{{ $groups->name }}">
                        @foreach($groups->categories as $category)
                            <option value="{{ $category->id }}"
                                    @if(isset($configuration->ynab_default_category) && $configuration->ynab_default_category == $category->id) SELECTED @endif
                            >{{ $category->name }} | {{ \App\Http\Controllers\Helper::convert_money($category->budgeted) }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            @endif
        </select>
    </div>
</div>