<table style="width:100%; border-collapse:collapse; font-size:14pt;">
    <thead>
        <tr>
            <th style="border:1px solid #000; padding:5px; width:25%; text-align:center;">วัน เดือน ปี</th>
            <th style="border:1px solid #000; padding:5px; width:40%; text-align:center;">ท้องที่หรือสถานที่ปฏิบัติงาน</th>
            <th style="border:1px solid #000; padding:5px; width:35%; text-align:center;">งานที่ปฏิบัติ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($travel_data as $item): ?>
            <?php $rowspan = count($item['tasks']); ?>

            <?php foreach ($item['tasks'] as $idx => $task): ?>
            <tr>
                <?php if ($idx === 0): // แถวแรกของกลุ่ม ใส่ rowspan ?>
                    <td rowspan="<?= $rowspan ?>" style="border:1px solid #000; padding:5px; text-align:center; vertical-align:middle;">
                        <?= $item['date'] ?>
                    </td>
                    <td rowspan="<?= $rowspan ?>" style="border:1px solid #000; padding:5px; vertical-align:middle;">
                        <?= $item['place'] ?>
                    </td>
                <?php endif; ?>
                <td style="border:1px solid #000; padding:5px; height:28px;">
                    <?= $task ?>
                </td>
            </tr>
            <?php endforeach; ?>

        <?php endforeach; ?>

        <!-- แถวว่างที่เหลือ -->
        <?php for ($i = $used_rows; $i < $total_rows; $i++): ?>
        <tr>
            <td style="border:1px solid #000; padding:5px; height:28px;">&nbsp;</td>
            <td style="border:1px solid #000; padding:5px; height:28px;">&nbsp;</td>
            <td style="border:1px solid #000; padding:5px; height:28px;">&nbsp;</td>
        </tr>
        <?php endfor; ?>

    </tbody>
</table>