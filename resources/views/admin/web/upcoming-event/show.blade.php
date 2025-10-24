<!-- Show Modal -->
<div class="modal fade" id="showModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel-{{ $row->id }}">{{ __('modal_view') }} {{ $title }}</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">{{ __('field_title') }}</th>
                            <td>{{ $row->title }}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>
                                @if($row->department_id)
                                    {{ $row->department->title ?? 'N/A' }}
                                @else
                                    <span class="badge badge-success">Home Page</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Event Date</th>
                            <td>{{ date('d M, Y', strtotime($row->event_date)) }}</td>
                        </tr>
                        <tr>
                            <th>Event Time</th>
                            <td>{{ $row->event_time ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Venue</th>
                            <td>{{ $row->venue ?? 'N/A' }}</td>
                        </tr>
                        @if($row->description)
                        <tr>
                            <th>{{ __('field_description') }}</th>
                            <td>{!! $row->description !!}</td>
                        </tr>
                        @endif
                        @if($row->link)
                        <tr>
                            <th>External Link</th>
                            <td><a href="{{ $row->link }}" target="_blank">{{ $row->link }}</a></td>
                        </tr>
                        @endif
                        @if($row->attach)
                        <tr>
                            <th>{{ __('field_image') }}</th>
                            <td>
                                @if(is_file('uploads/'.$path.'/'.$row->attach))
                                <img src="{{ asset('uploads/'.$path.'/'.$row->attach) }}" alt="{{ $row->title }}" style="max-width: 100%; height: auto;">
                                @endif
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th>Display Order</th>
                            <td>{{ $row->display_order }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('field_status') }}</th>
                            <td>
                                @if( $row->status == 1 )
                                <span class="badge badge-pill badge-success">{{ __('status_active') }}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{ __('status_inactive') }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('btn_close') }}</button>
        </div>
      </div>
    </div>
</div>

