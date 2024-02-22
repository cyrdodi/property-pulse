"use client";

import React from "react";
import {
  useRouter,
  useParams,
  useSearchParams,
  usePathname,
} from "next/navigation";

const PropertyPage = () => {
  const router = useRouter();
  const { id } = useParams();
  const searchParams = useSearchParams();
  const path = usePathname();

  const name = searchParams.get("name");

  return (
    <div>
      <button
        onClick={() => router.push("/")}
        className="rounded-lg p-2 bg-blue-200"
      >
        Go Home {name}, id of {id}
      </button>

      <div>
        Path name = <code>{path}</code>
      </div>
    </div>
  );
};

export default PropertyPage;
