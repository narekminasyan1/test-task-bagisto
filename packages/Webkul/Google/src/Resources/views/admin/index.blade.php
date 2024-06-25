<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        Google Api Integration
    </x-slot>

    <!-- Page Content -->
    <div class="page-content">
        <h1>Google Api Integration</h1>
    </div>

        <x-admin::table>
            <x-admin::table.thead>
                <x-admin::table.thead.tr>
                    <x-admin::table.th>
                        PageSpeed Insights API Demo
                    </x-admin::table.th>

                </x-admin::table.thead.tr>
            </x-admin::table.thead>

            <x-admin::table.tbody>
                <x-admin::table.tbody.tr>
                    <x-admin::table.td>
                        <p><strong>Page tested :</strong> https://developers.google.com</p>
                    </x-admin::table.td>

                    </x-admin::table.thead.tr>
            </x-admin::table.tbody>
        </x-admin::table>

        <x-admin::table>
            <x-admin::table.thead>
                <x-admin::table.thead.tr>
                    <x-admin::table.th>
                        Chrome User Experience Report Results
                    </x-admin::table.th>

                </x-admin::table.thead.tr>
            </x-admin::table.thead>

            <x-admin::table.tbody>
                <x-admin::table.tbody.tr>
                    <x-admin::table.td>
                        <p><strong>First Contentful Paint :</strong> {{ $data['loadingExperience']['metrics']['FIRST_CONTENTFUL_PAINT_MS']['category'] }}</p>
                        <br>
                        <p><strong>First Input Delay :</strong> {{ $data['loadingExperience']['metrics']['FIRST_INPUT_DELAY_MS']['category'] }}</p>
                    </x-admin::table.td>

                    </x-admin::table.thead.tr>
            </x-admin::table.tbody>
        </x-admin::table>

        <x-admin::table>
            <x-admin::table.thead>
                <x-admin::table.thead.tr>
                    <x-admin::table.th>
                        Lighthouse Results
                    </x-admin::table.th>

                </x-admin::table.thead.tr>
            </x-admin::table.thead>

            <x-admin::table.tbody>
                @foreach($data['lighthouseResult']['audits'] as $row_audit)
                <x-admin::table.tbody.tr>
                    <x-admin::table.td>
                        id: {{ $row_audit['id'] }} <br>
                        title: {{ $row_audit['title'] }} <br>
                        score: {{ $row_audit['score'] }} <br>
                        scoreDisplayMode: {{ $row_audit['scoreDisplayMode'] }} <br>
                    </x-admin::table.td>

                    </x-admin::table.thead.tr>
                @endforeach
            </x-admin::table.tbody>
        </x-admin::table>
</x-admin::layouts>


