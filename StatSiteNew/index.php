<div class="container mx-auto">
  <?php include 'Header.php'; ?>
  <?php $page = 'index.php'; ?>
  <div class="py-4">
    <h3 class="text-xl font-bold">ABOUT OUR COMPANY</h3>
  </div>
  <table class="bg-gray-600 h-20 w-99% text-white border-collapse border-2 border-white rounded-lg">
    <tr>
      <td class="align-top bg-white p-8">
        <div class="py-4">
          <h2 class="text-3xl text-center text-maroon font-bold">EXPERIMENTAL WEBSITE TO TEST VISITOR TRACKING SCRIPTS</h2>
        </div>
        <ol class="text-lg list-disc list-inside">
          <li>Click the button below to see detailed statistics of the website visits.<br><a href="index_admin.php" class="text-blue-500 font-bold">STATISTICS</a></li>
          <li>Observe the visit counter change as you refresh the page multiple times.</li>
        </ol>
      </td>
    </tr>
  </table>
  <?php include 'set_stat.php'; ?>
</div>
