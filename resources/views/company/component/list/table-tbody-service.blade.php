<table class="table table-blue table-result">
    <tbody>
        @php $count = 1; $tracker = [];@endphp

        @foreach ($companies as $index => $company)
            @for ($i = $index + 1; $i < $companies->count(); $i++)
                @if ($companies[$i]->service_id === $companies[$index]->service_id && !in_array($i, $tracker))
                    @php $count++; $tracker[] = $i; @endphp
                @else
                    @break
                @endif
            @endfor
            <!--begin grouping by system row 1-->
            @if (!in_array($index, $tracker))
                <tr>
                    <td rowspan="{{ $count }}" class="custom-checkbox checkbox-table col-checkbox">
                        {{ Form::checkbox('cb-get-id[]', 1, false, ['id' => 'cb-get-id-' . $company->id]) }}
                        <label for="cb-get-id-{{ $company->id }}"></label>
                    </td>
                    <td rowspan="{{ $count }}" class="col-service-name">
                        <a href="javascript:void(0)" class="open-popup-detail-system"
                            data-url="{{ route('company.detail') }}">{{ $company->service_name_jp }}
                        </a>
                    </td>
                    <td class="col-company-nation">
                        {{ $company->nation_jp }}
                    </td>
                    <td class="col-office-address">
                        {{ $company->head_office_address }}
                    </td>
                    <td  class="col-ope-company">
                        {{ $company->ope_company_name }}
                    </td>
                    <td class="col-ope-person">
                        {{ $company->ope_person_name_1 }}
                    </td>
                    <td class="col-ope-email">
                        {{ $company->ope_email_1 }}
                    </td>
                    <td class="col-ope-phone">
                        {{ $company->ope_phone_1 }}
                    </td>
                    <td class="col-ope-person">
                        {{ $company->ope_person_name_2 }}
                    </td>
                    <td class="col-ope-email">
                        {{ $company->ope_email_2 }}
                    </td>
                    <td class="col-ope-phone">
                        {{ $company->ope_phone_2 }}
                    </td>
                    <td class="col-company-name">
                        {{ $company->name_jp }}
                    </td>
                    <td class="col-license">{{ $company->license }}</td>
                    <td rowspan="{{ $count }}" class="col-toltal-license">35</td>
                    <td class="table-action col-action">
                        <a href="{{ route('company.show', $company->id) }}" class="btn btn-blue-dark btn-custom-sm btn-lock">
                            {{ trans('company.btn_detail') }}
                        </a>
                    </td>
                </tr>
            @elseif (in_array($index, $tracker))
                <tr>
                    <td class="col-company-nation">
                        {{ $company->nation_jp }}
                    </td>
                    <td class="col-office-address">
                        {{ $company->head_office_address }}
                    </td>
                    <td  class="col-ope-company">
                        {{ $company->ope_company_name }}
                    </td>
                    <td class="col-ope-person">
                        {{ $company->ope_person_name_1 }}
                    </td>
                    <td class="col-ope-email">
                        {{ $company->ope_email_1 }}
                    </td>
                    <td class="col-ope-phone">
                        {{ $company->ope_phone_1 }}
                    </td>
                    <td class="col-ope-person">
                        {{ $company->ope_person_name_2 }}
                    </td>
                    <td class="col-ope-email">
                        {{ $company->ope_email_2 }}
                    </td>
                    <td class="col-ope-phone">
                        {{ $company->ope_phone_2 }}
                    </td>
                    <td class="col-company-name">
                        {{ $company->name_jp }}
                    </td>
                    <td class="col-license">{{ $company->license }}</td>
                    <td class="table-action col-action">
                        <a href="{{ route('company.show', $company->id) }}" class="btn btn-blue-dark btn-custom-sm btn-lock">
                            {{ trans('company.btn_detail') }}
                        </a>
                    </td>
                </tr>
                @if ($index == $companies->count() - 1 || $company->service_id !== $companies[$index + 1]->service_id)
                    @php $count = 1; $tracker = []; @endphp
                @endif
            @endif
        @endforeach
    </tbody>
</table>