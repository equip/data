<?php

namespace Spark\Data\Repository;

interface DeleteRepositoryInterface
{
    /**
     * Delete a single object by identifier
     *
     * @param mixed $id
     *
     * @return boolean
     */
    public function delete($id);

    /**
     * Delete a single object by variable criteria
     *
     * @param array $criteria
     *
     * @return boolean
     */
    public function deleteOneBy(array $criteria);

    /**
     * Delete multiple objects by variable criteria
     *
     * @param array $criteria
     * @param array $order_by
     * @param integer $limit
     *
     * @return integer
     */
    public function deleteBy(array $criteria, array $order_by = null, $limit = null);
}
